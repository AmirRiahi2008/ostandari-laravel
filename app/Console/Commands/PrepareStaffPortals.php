<?php

namespace App\Console\Commands;

use App\Services\StaffPortals;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\{Artisan, DB};

final class PrepareStaffPortals extends Command
{
    protected $signature = 'portal:prepare-staff-portals';
    protected $description = 'Add isolated staff page tables and missing staff pages without changing existing content or accounts.';
    public function handle(): int
    {
        $lock = false;
        try {
            $lock = (int) DB::selectOne("SELECT GET_LOCK('portal_prepare_staff_portals', 15) AS acquired")->acquired === 1;
            if (!$lock) return self::FAILURE;
            if (!StaffPortals::ready()) {
                $result = Artisan::call('migrate', ['--path' => 'database/migrations/2026_10_30_000001_create_staff_portals.php', '--force' => true, '--no-interaction' => true]);
                $this->output->write(Artisan::output());
                if ($result !== self::SUCCESS) return $result;
            }
            $count = StaffPortals::sync();
            if (StaffPortals::bootstrapDemo()) $this->info('Requested staff test account created.');
            $this->info('Staff pages ready; '.$count.' added. Existing content and accounts preserved.');
            return self::SUCCESS;
        } finally { if ($lock) DB::select("SELECT RELEASE_LOCK('portal_prepare_staff_portals')"); }
    }
}
