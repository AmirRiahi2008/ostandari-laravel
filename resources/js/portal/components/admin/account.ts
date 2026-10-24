import {api} from '@/lib/api/client';

export async function logoutAdmin(_preview=false):Promise<void>{
  await api('auth/logout',{method:'POST'});
  window.location.assign('/panel/admin/login');
}
