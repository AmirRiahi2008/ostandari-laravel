<div class="container-naghshe portal-counties source-county-map" id="counties" x-data="{selected:'sari',counties:[{&quot;slug&quot;:&quot;ramsar&quot;,&quot;name&quot;:&quot;رامسر&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/ramsar.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;tonekabon&quot;,&quot;name&quot;:&quot;تنکابن&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/ton.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;abbasabad&quot;,&quot;name&quot;:&quot;عباس‌آباد&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;chalus&quot;,&quot;name&quot;:&quot;چالوس&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/chalos.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;noshahr&quot;,&quot;name&quot;:&quot;نوشهر&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;mahmudabad&quot;,&quot;name&quot;:&quot;محمودآباد&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;amol&quot;,&quot;name&quot;:&quot;آمل&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/101.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;fereydunkenar&quot;,&quot;name&quot;:&quot;فریدونکنار&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;babolsar&quot;,&quot;name&quot;:&quot;بابلسر&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;juybar&quot;,&quot;name&quot;:&quot;جویبار&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;simorgh&quot;,&quot;name&quot;:&quot;سیمرغ&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;babol&quot;,&quot;name&quot;:&quot;بابل&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/102.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;savadkuh&quot;,&quot;name&quot;:&quot;سوادکوه&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;savadkuh-shomali&quot;,&quot;name&quot;:&quot;سوادکوه شمالی&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;sari&quot;,&quot;name&quot;:&quot;ساری&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;galugah&quot;,&quot;name&quot;:&quot;گلوگاه&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;miandorud&quot;,&quot;name&quot;:&quot;میاندورود&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;qaemshahr&quot;,&quot;name&quot;:&quot;قائم‌شهر&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;nur&quot;,&quot;name&quot;:&quot;نور&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;kelardasht&quot;,&quot;name&quot;:&quot;کلاردشت&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/kelar.png&quot;,&quot;usesPreviewTemplate&quot;:false},{&quot;slug&quot;:&quot;neka&quot;,&quot;name&quot;:&quot;نکا&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/100.png&quot;,&quot;usesPreviewTemplate&quot;:true},{&quot;slug&quot;:&quot;behshahr&quot;,&quot;name&quot;:&quot;بهشهر&quot;,&quot;previewImage&quot;:&quot;/design/site/assets/Img/behshar.png&quot;,&quot;usesPreviewTemplate&quot;:false}],get current(){return this.counties.find(c=>c.slug===this.selected)}}">
<div class="wrapper">
<div class="lefttt portal-county-preview" data-preview-county="sari">
<div class="portal-county-photo county-artwork" data-county-artwork="sari">
<img id="cityImage" src="/design/site/assets/Img/100.png" alt="طرح فرمانداری شهرستان ساری" width="1536" height="1024" loading="lazy" :src="current.previewImage" :alt="'فرمانداری '+current.name">
</div>
<div class="portal-county-preview-body">
<div class="portal-county-caption" role="status" aria-live="polite" aria-atomic="true" x-text="'فرمانداری '+current.name">فرمانداری ساری</div>
<a href="/sari" class="left-ksks" :href="'/'+selected" x-text="'ورود به پرتال '+current.name+' ←'">ورود به پرتال ساری<span aria-hidden="true">←</span>
</a>
</div>
</div>
<div class="righttt">
<h2 class="title">فرمانداری‌ها</h2>
<p class="portal-map-hint" id="_R_0_-hint">برای دیدن فرمانداری، روی نام یا محدودهٔ شهرستان بروید و برای ورود کلیک کنید.</p>
<div class="portal-map-viewport" tabindex="0" aria-label="نقشهٔ شهرستان‌ها؛ در نمایش کوچک قابل پیمایش افقی است">
<svg class="map" viewBox="0 -35 680 355" role="group" aria-label="نقشه فرمانداری‌های مازندران" aria-describedby="_R_0_-hint">
<g class="county-shape-layer">
<a href="/ramsar" aria-label="ورود به فرمانداری رامسر" data-county="ramsar" tabindex="0" class="county-region" @mouseenter="selected='ramsar'" @focus="selected='ramsar'" :class="{'is-selected':selected==='ramsar'}">
<title>فرمانداری رامسر</title>
<path class="city" d="M58.5,64.6c0-1,1.6-3.1,2.1-3.1c9.3-1.4,18.5-6.1,21.9-14.4l-14-7.1l-2.2-2.2l-5-4.8L59,31.9l-3.4-0.6 l-7.8-5c0,0.1,0,0.2-0.1,0.3l-8.4,19.6c-0.1,0.2-8.5,18.3-11.2,25.2C25.6,77.7,13.8,88.2,9.4,92c3.3,1,6.2,1.8,8.4,1.8 c3.7,0,10.1,3.1,18.1,8C48,93.2,56.7,79.9,58.5,64.6z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/tonekabon" aria-label="ورود به فرمانداری تنکابن" data-county="tonekabon" tabindex="0" class="county-region" @mouseenter="selected='tonekabon'" @focus="selected='tonekabon'" :class="{'is-selected':selected==='tonekabon'}">
<title>فرمانداری تنکابن</title>
<path class="city" d="M108,129.7c0-1.6-2.6-2.6-3.7-4.2c-2.6-4.7,5.2-9.9,8.3-7.3c10.4,7.8,20.8-0.5,23.4-7.8 c1.6-5.2-10.4-7.3-13.5-14c-1.6-3.1-0.5-6.3,3.1-6.8c-1.6-6.6,0.7-11.5,5.6-14.8l-13.1-5.6l-23.5-16l-12.1-6.1 c-3.4,8.4-12.7,13-21.9,14.4c-0.5,0-2.1,2.1-2.1,3.1C56.7,79.9,48,93.2,35.9,101.7c7.2,4.4,15.8,10.2,24.9,16.6 c6,4.2,11.3,7.8,14.1,9.4c9.4,5.4,10.7,22.3,10.9,27.2c3,1.5,11.6,5.9,19.5,10.3C111.5,154.6,108.9,141.3,108,129.7z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/abbasabad" aria-label="ورود به فرمانداری عباس‌آباد" data-county="abbasabad" tabindex="0" class="county-region" @mouseenter="selected='abbasabad'" @focus="selected='abbasabad'" :class="{'is-selected':selected==='abbasabad'}">
<title>فرمانداری عباس‌آباد</title>
<path class="city" d="M154.3,101.6c10.1-0.9,9.3-11.6,8.9-20.6l-31.3-5.9l-0.7-0.3c-4.9,3.3-7.2,8.2-5.6,14.8 c-3.6,0.5-4.7,3.6-3.1,6.8c3.1,6.8,15.1,8.8,13.5,14.1c-0.2,0.6-0.5,1.1-0.7,1.7c0.5-0.1,0.9-0.3,1.3-0.6 C142.3,107.3,147,102.6,154.3,101.6z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/chalus" aria-label="ورود به فرمانداری چالوس" data-county="chalus" tabindex="0" class="county-region" @mouseenter="selected='chalus'" @focus="selected='chalus'" :class="{'is-selected':selected==='chalus'}">
<title>فرمانداری چالوس</title>
<path class="city" d="M190.2,116.1c5.7-2.1,1.6-11.4-2.1-16.7c-1-2.6,1.6-4.2,2.6-6.2c0.6-2.2,0.1-4.1-0.4-6.1l-12.4-3.3L163.2,81 c0.3,7.9,1,17.2-5.8,19.9c0.6,2,1.2,4,2,5.9C164.7,117.7,180.3,120.3,190.2,116.1z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/noshahr" aria-label="ورود به فرمانداری نوشهر" data-county="noshahr" tabindex="0" class="county-region" @mouseenter="selected='noshahr'" @focus="selected='noshahr'" :class="{'is-selected':selected==='noshahr'}">
<title>فرمانداری نوشهر</title>
<path class="city" d="M231.3,174.4c4.7,1.6,9.4-3.1,9.9-6.8c1-8.3,8.8-12,11.4-18.7c1.6-4.2-3.1-6.2-5.7-8.8 c-1-1.6,0.5-2.6,1.6-3.6c5.7-7.3,22.4-6.8,18.7-19.8c-0.5-0.5,1.6-1.6,2.1-2.1c0.9-3.5-0.4-6.6-1.5-9.9l-1.2,0.1l-29.2-7.9 l-30.3-5.3l-16.8-4.5c0.5,2,1,4,0.4,6.1c-1,2.1-3.7,3.6-2.6,6.2c3.6,5.2,7.8,14.6,2.1,16.7c-5,2.1-11.5,2.5-17.4,0.9 c-3.2,5.3-4.1,12.1-0.3,17.8c4.7,6.2,0,13-4.2,19.3c-1,1.6-1.6,4.7,0.5,6.3c2.5,1.8,4.5,3.9,5.7,6.2c4,2.3,8.5,3.7,13,4.2 C202.1,171.8,217.2,168.7,231.3,174.4z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/mahmudabad" aria-label="ورود به فرمانداری محمودآباد" data-county="mahmudabad" tabindex="0" class="county-region" @mouseenter="selected='mahmudabad'" @focus="selected='mahmudabad'" :class="{'is-selected':selected==='mahmudabad'}">
<title>فرمانداری محمودآباد</title>
<path class="city" d="M329.6,116.7c1.6,1.6,3.6,0.5,5.2-0.5c1.6-2.1,1.6-5.2,3.1-6.2c3.6-2.6,8.3,0.5,11.4-2.1 c7.5-5.5,7.3-15.3,9.6-23.9l-6.6,1.2l-28.3,6.5L311.5,96c0.2,0.3,0.3,0.5,0.4,0.8c1,3.1,0.5,6.2-1,9.4c-1.6,3.6,3.6,6.2,7.3,7.3 c0.4,0,0.8,0.2,1.2,0.5C323.1,113.9,326.7,114,329.6,116.7z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/amol" aria-label="ورود به فرمانداری آمل" data-county="amol" tabindex="0" class="county-region" @mouseenter="selected='amol'" @focus="selected='amol'" :class="{'is-selected':selected==='amol'}">
<title>فرمانداری آمل</title>
<path class="city" d="M356.5,95.9c-1.2,4.7-3,8.9-7,11.9c-3.1,2.6-7.8-0.5-11.4,2.1c-1.6,1-1.6,4.2-3.1,6.2 c-1.6,1-3.6,2.1-5.2,0.5c-3-2.6-6.6-2.8-10.3-2.6c0.7,0.5,1.3,1.4,0.9,2.1c-2.1,3.1-5.7,6.2-2.6,9.4c3.6,4.7,5.2,9.4,8.3,14.6 c0.5,1.6,2.6,2.6,3.1,4.2c1.6,3.1,0.5,7.3-2.1,7.8c-5.7,1-12.5-2.1-14.6,5.7c-2.1,10.4,3.1,19.3,12.5,24.5 c4.2,2.6,8.3,9.9,2.6,13c-3.1,2.1-6.8-3.6-10.9-0.5c-2.1,1.6-4.2,4.7-6.8,3.6c-3.1-1.6-6.8-3.6-9.9-2.1c-7.3,2.6-15.6,0-22.4,4.2 c-6.2,3.6-7.3,12.5-14.1,16.1c-6.2,3.1-12.5-0.5-18.7-2.1c-2.4-0.7-4.5,0.4-6.8,1.3c3.5,1.8,6.5,3.4,8.2,4.7 c6.3,4.7,12,13.8,14.8,23.6c1.5,5.1,6.9,7.2,13.2,9.6c4.3,1.6,8.7,3.3,12.6,6.1c7.8,5.6,12.6,5.4,18.2,5.3c1,0,2-0.1,3-0.1 c6.3,0,17.3-2.6,24.2-6.7c7.3-4.4,19.2-13.9,23-21.6c1-2.1,3.1-3.6,6.2-4.5c1.8-0.5,4-0.8,6.3-1c1-4,2.5-8-1.7-11.4 c-1.6-1.6,2.1-4.2,4.7-3.6c-4.2-3.1-7.3-8.3-5.2-13c2.6-5.7,3.1-12,1.6-16.7c-2.1-5.7-9.9-8.3-14-13.5c-1-2.1,1.6-2.1,3.1-2.6 c-3.1-8.8,3.7-13,9.9-18.2c1.6-1,1.6-4.2,1-6.8c-1.6-6.2-9.4-11.4-6.3-17.2c4.2-6.2,10.4-13,6.3-20.8c0.5-0.2,1-0.3,1.6-0.5 C363.4,104.5,359.4,100.7,356.5,95.9z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/fereydunkenar" aria-label="ورود به فرمانداری فریدونکنار" data-county="fereydunkenar" tabindex="0" class="county-region" @mouseenter="selected='fereydunkenar'" @focus="selected='fereydunkenar'" :class="{'is-selected':selected==='fereydunkenar'}">
<title>فرمانداری فریدونکنار</title>
<path class="city" d="M373.9,91.2c3.2-3.5,4.9-7.1,5.5-10.9L359,84c-1,3.9-1.6,8.1-2.5,11.9c2.9,4.8,7,8.6,12.2,10.9 c4.6-1.4,8.6-2.7,6.3-7.9C373.9,96.4,372.3,92.7,373.9,91.2z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/babolsar" aria-label="ورود به فرمانداری بابلسر" data-county="babolsar" tabindex="0" class="county-region" @mouseenter="selected='babolsar'" @focus="selected='babolsar'" :class="{'is-selected':selected==='babolsar'}">
<title>فرمانداری بابلسر</title>
<path class="city" d="M389,101.6c3.1-2.6,9.9,0.5,13.5-2.6c3.1-2.6,7.8-0.5,9.4-3.6c1.6-3.1,4.7-4.7,5.7-7.3 c0.5-2.1,1-5.2-2.1-5.2c0.9-3.7,3-6.9,2.8-10.9l-8.7,2.5l-28.1,5.3l-2.2,0.4c-0.6,3.9-2.4,7.4-5.5,10.9c-1.6,1.6,0,5.2,1,7.8 c1.2,2.6,0.7,4.3-0.6,5.4c1.4,0.9,2.8,1.8,4.2,2.4C382.7,108.8,386.4,104.7,389,101.6z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/juybar" aria-label="ورود به فرمانداری جویبار" data-county="juybar" tabindex="0" class="county-region" @mouseenter="selected='juybar'" @focus="selected='juybar'" :class="{'is-selected':selected==='juybar'}">
<title>فرمانداری جویبار</title>
<path class="city" d="M423.8,107.8c3.6,2.6,8.8,3.1,11.4-0.5c0.5-1.6-2.1-4.7-0.5-5.2c3.6-1.6,8.8-2.1,9.9-5.2 c0.5-4.2-0.5-6.8,0.5-10.9c1-2.6-4.7-6.2-2.6-8.8c4-4.4,3.4-8.5,1.2-12.5l-6.1,1.8L418.3,72c0.2,3.9-1.9,7.2-2.8,10.9 c3.1,0,2.6,3.1,2.1,5.2c-1,2.6-4.2,4.2-5.7,7.3c-0.1,0.3-0.3,0.5-0.4,0.7C415.6,99.7,419.2,104.4,423.8,107.8z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/simorgh" aria-label="ورود به فرمانداری سیمرغ" data-county="simorgh" tabindex="0" class="county-region" @mouseenter="selected='simorgh'" @focus="selected='simorgh'" :class="{'is-selected':selected==='simorgh'}">
<title>فرمانداری سیمرغ</title>
<path class="city" d="M412.4,115.1c3.9,1.7,7.8-3.3,11.6-7.2c-0.1,0-0.1-0.1-0.2-0.1c-4.7-3.4-8.2-8.1-12.4-11.8 c-1.9,2.1-6.1,0.6-8.9,3c-0.6,0.5-1.2,0.8-1.9,1C405,105,406.4,112.7,412.4,115.1z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/babol" aria-label="ورود به فرمانداری بابل" data-county="babol" tabindex="0" class="county-region" @mouseenter="selected='babol'" @focus="selected='babol'" :class="{'is-selected':selected==='babol'}">
<title>فرمانداری بابل</title>
<path class="city" d="M403,211.4c2.1-3.6-5.2-5.2-5.7-7.8c-1-4.7,0-9.9-4.2-14.1c-2.1-2.1-1-6.8,1-9.4c3.1-4.2,7.8-6.2,11.4-10.4 c0.5-1,3.7,0,5.2-0.5c1.6-1,3.6-3.1,3.1-5.7c-0.5-2.1-3.1-4.2-3.1-5.7c0.5-9.4-5.2-15.1-10.9-21.3c-0.5-0.5-0.5-2.6,0-2.6 c5.7-3.6,9.9-7.8,8.3-14.6c1.6,0,1-2.1,2.6-2.1c0-1,0-1.9-0.1-2.9c-4.7-3-6.2-9.7-10.1-14.3c-3.8,1.3-9-0.6-11.7,1.6 c-2.6,3.1-6.2,7.3-10.4,5.2c-1.4-0.6-2.8-1.5-4.2-2.4c-1.6,1.4-4.4,2.1-7.2,2.9c4.2,7.8-2.1,14.6-6.3,20.8 c-3.1,5.7,4.7,10.9,6.3,17.2c0.5,2.6,0.5,5.7-1,6.8c-6.2,5.2-13,9.4-9.9,18.2c-1.6,0.5-4.2,0.5-3.1,2.6c4.1,5.2,12,7.8,14,13.5 c1.6,4.7,1,10.9-1.6,16.7c-2.1,4.7,1,9.9,5.2,13c-2.6-0.5-6.2,2.1-4.7,3.6c4.2,3.4,2.8,7.5,1.7,11.4c7.5-0.4,16.8,1.1,23.6,3.1 C388.8,223.2,398.4,219.5,403,211.4z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/savadkuh" aria-label="ورود به فرمانداری سوادکوه" data-county="savadkuh" tabindex="0" class="county-region" @mouseenter="selected='savadkuh'" @focus="selected='savadkuh'" :class="{'is-selected':selected==='savadkuh'}">
<title>فرمانداری سوادکوه</title>
<path class="city" d="M481.1,228.5c4.7-11.4-7.8-16.1-13.5-24.5c-6.2-8.8-3.6-17.7,1-27.1c2.6-5.2-5.2-11.5-12-12.5 c-7.3-1.6-13.5,2.1-19.8,4.2c-7.3,2.1-13-3.1-19.3-5.7c-1.3-0.6-2.7-0.8-4.2-0.8c0.3,0.4,0.5,0.9,0.6,1.3 c0.5,2.6-1.6,4.7-3.1,5.7c-1.6,0.5-4.7-0.5-5.2,0.5c-3.6,4.2-8.3,6.2-11.4,10.4c-2.1,2.6-3.1,7.3-1,9.4c4.2,4.2,3.1,9.4,4.2,14 c0.5,2.6,7.8,4.2,5.7,7.8c-4.6,8.2-14.2,11.8-11.6,22.8c3.2,0.9,5.9,2,7.5,2.9c4.1,2.5,16.4,5.1,26.3,7.3 c6.5,1.4,12.1,2.6,15.4,3.7c1,0.3,2,0.7,3.1,1c0.2-0.3,0.4-0.6,0.8-0.8c0.8-0.5,20.2-11.5,30.5-11.5c2.8,0,5.2-1.4,7.3-3.5 C481.3,231.8,480.3,230.1,481.1,228.5z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/savadkuh-shomali" aria-label="ورود به فرمانداری سوادکوه شمالی" data-county="savadkuh-shomali" tabindex="0" class="county-region" @mouseenter="selected='savadkuh-shomali'" @focus="selected='savadkuh-shomali'" :class="{'is-selected':selected==='savadkuh-shomali'}">
<title>فرمانداری سوادکوه شمالی</title>
<path class="city" d="M456.6,157.2c-5.2-4.2-7.4-8.5-10.4-13.8c-4.5,1.6-9-1.7-14-0.7c-7.9,2.2-14.6,6.6-22.5,7.3 c0.9,2.3,1.3,4.9,1.1,7.8c0,1.2,1.6,2.8,2.5,4.4c1.5,0,2.9,0.3,4.2,0.8c6.2,2.6,12,7.8,19.2,5.7c6.2-2.1,12.4-5.6,19.6-4.2 C459,162.4,460.2,160.3,456.6,157.2z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/sari" aria-label="ورود به فرمانداری ساری" data-county="sari" tabindex="0" class="county-region" @mouseenter="selected='sari'" @focus="selected='sari'" :class="{'is-selected':selected==='sari'}">
<title>فرمانداری ساری</title>
<path class="city" d="M570.6,153.6c-3.6,2.6-8.3-1.6-11.4,0.5c-9.4,6.3-21.9,7.8-29.1,0c-3.6-4-6-9.5-9.6-14 c-8.8,2.6-21.7,7.2-27.4-2.1c-1.6-2.6,1-5.7,0-7.3c-6.2-9.9-13.5-18.2-23.4-23.9c2.6-4.7-0.5-9.4,1-14.1c0.5-1,1-2.1,1.6-2.6 c2.6-4.2-3.6-6.2-4.1-9.4c-1-7.6,2.4-15.7-2.7-22.3l-0.5,0.1l-21.1,6.1c2.2,4,2.7,8.1-1.2,12.5c-2.1,2.6,3.6,6.2,2.6,8.8 c-1,4.2,0,6.8-0.5,10.9c-1,3.1-6.2,3.6-9.9,5.2c-1.6,0.5,1,3.6,0.5,5.2c-0.4,0.6-0.9,1-1.4,1.4c-2.7,10.4,11.2,16.4,16,24.6 c1.6,3.1,0,8.3-3.1,9.9c-0.2,0.1-0.4,0.1-0.5,0.2c3.1,5.4,5.3,9.6,10.4,13.8c3.6,3,2.3,5.2-0.2,7.2c0.1,0,0.1,0,0.2,0 c6.8,1,14.6,7.3,12,12.5c-4.7,9.4-7.3,18.2-1,27.1c5.7,8.3,18.2,13,13.5,24.5c-0.8,1.6,0.3,3.2,1.3,4.8c2.1-2,3.9-4.7,5.9-7.5 c2-2.8,4-5.7,6.3-8.1c7.6-7.6,16.6-11.8,25.3-11.8c7.4,0,27.4-1.1,31.4-1.4c4.6-4.1,35-30.8,41.6-36.1c4.5-3.6,4.8-8.3,1-14 c-1.7-2.6-1.1-6.3-0.4-8.9C585.3,145.1,577.8,149.4,570.6,153.6z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/galugah" aria-label="ورود به فرمانداری گلوگاه" data-county="galugah" tabindex="0" class="county-region" @mouseenter="selected='galugah'" @focus="selected='galugah'" :class="{'is-selected':selected==='galugah'}">
<title>فرمانداری گلوگاه</title>
<path class="city" d="M553.4,73.5c0,2.1-3.6,3.1-4.2,5.2c-2.1,10.4,9.4,12,17.2,10.9c1,0,1.6,1.6,1.6,2.1 c1,9.9,7.8,16.1,17.7,13.5c7.4-2.3,14.3-6.8,21.6-8.5c-5.8-2.3-10.7-4.4-11.1-4.5c-1.1-0.5-9.5-4.9-11-11.2 c-1.5-5.8-1.5-16.9-1.5-17.3c0-0.8,0.5-1.5,1.2-1.9l-23.2-2.1h-0.5C556.1,62,554.3,67.9,553.4,73.5z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/miandorud" aria-label="ورود به فرمانداری میاندورود" data-county="miandorud" tabindex="0" class="county-region" @mouseenter="selected='miandorud'" @focus="selected='miandorud'" :class="{'is-selected':selected==='miandorud'}">
<title>فرمانداری میاندورود</title>
<path class="city" d="M468.1,80.7c0.5,3.1,6.8,5.2,4.1,9.4c-0.5,0.5-1,1.6-1.6,2.6c-1.6,4.7,1.6,9.4-1,14.1 c9.9,5.7,17.2,14.1,23.4,23.9c1,1.6-1.6,4.7,0,7.3c5.7,9.4,18.7,4.7,27.6,2.1c-2.6-10.9-9.9-22.9-22.4-23.9 c-1-0.5-2.6-1.6-2.1-2.6c1-8.8-7.3-11.4-10.9-17.7c-0.5-1.6-1-3.1-0.5-4.7c1.6-2.6,4.2-4.7,3.1-7.8c-1.6-2.6-4.7-4.7-3.6-7.8 c2.4-6.4-0.4-14.2-4.6-20.1l-14.2,3C470.5,65.1,467.1,73.2,468.1,80.7z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/qaemshahr" aria-label="ورود به فرمانداری قائم‌شهر" data-county="qaemshahr" tabindex="0" class="county-region" @mouseenter="selected='qaemshahr'" @focus="selected='qaemshahr'" :class="{'is-selected':selected==='qaemshahr'}">
<title>فرمانداری قائم‌شهر</title>
<path class="city" d="M449.9,133.3c-4.8-8.2-18.7-14.2-16-24.6c-2.7,2-6.8,1.3-9.9-0.8c-3.9,3.9-7.8,8.9-11.6,7.2 c-0.6-0.2-1.1-0.5-1.6-0.8c0.1,1,0.1,1.9,0.1,2.9c-1.6,0-1,2.1-2.6,2.1c1.6,6.8-2.6,10.9-8.3,14.6c-0.5,0-0.5,2.1,0,2.6 c3.9,4.3,7.9,8.4,9.8,13.5c7.8-0.7,14.6-5.1,22.5-7.3c5-1,9.5,2.3,14,0.7c-0.3-0.6,0.4,0.6,0,0c0.4,0.6-0.3-0.6,0,0 c0.2-0.1,0.4-0.1,0.5-0.2C449.9,141.6,451.4,136.4,449.9,133.3z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/nur" aria-label="ورود به فرمانداری نور" data-county="nur" tabindex="0" class="county-region" @mouseenter="selected='nur'" @focus="selected='nur'" :class="{'is-selected':selected==='nur'}">
<title>فرمانداری نور</title>
<path class="city" d="M244.8,214.5c6.2,1.6,12.5,5.2,18.7,2.1c6.8-3.6,7.8-12.5,14.1-16.1c6.8-4.2,15.1-1.6,22.4-4.2 c3.1-1.6,6.8,0.5,9.9,2.1c2.6,1,4.7-2.1,6.8-3.6c4.2-3.1,7.8,2.6,10.9,0.5c5.7-3.1,1.6-10.4-2.6-13c-9.4-5.2-14.6-14.1-12.5-24.5 c2.1-7.8,8.8-4.7,14.6-5.7c2.6-0.5,3.6-4.7,2.1-7.8c-0.5-1.6-2.6-2.6-3.1-4.2c-3.1-5.2-4.7-9.9-8.3-14.6 c-3.1-3.1,0.5-6.2,2.6-9.4c0.5-1-1-2.6-2.1-2.6c-3.6-1-8.8-3.6-7.3-7.3c1.6-3.1,2.1-6.2,1-9.4c-0.1-0.3-0.2-0.6-0.4-0.8 l-14.4,5.1l-29.4,3.5c1.1,3.3,2.4,6.5,1.5,9.9c-0.5,0.5-2.6,1.6-2.1,2.1c3.6,13-13,12.5-18.7,19.8c-1,1-2.6,2.1-1.6,3.6 c2.6,2.6,7.3,4.7,5.7,8.8c-2.6,6.8-10.4,10.4-11.4,18.7c-0.5,3.6-5.2,8.3-9.9,6.8c-14-5.7-29.1-2.6-43.7-3.6 c-4.5-0.4-9-1.9-13-4.2c2.3,4.4,2,9.5-2,14.6c-1.3,1.7-1.9,4.6-0.8,7.3c5,0.4,9.9,0.7,13,0.7c2.6,0,5.4,0.5,8.3,1.4 c0.1,0,0.2,0,0.3,0c0.4,0,0.7,0.2,1,0.4c5.6,1.9,11.6,5.4,16.9,9.9c4.7,3.9,13.7,8.4,21.7,12.4c1.8,0.9,3.5,1.7,5.1,2.5 C240.3,214.9,242.4,213.8,244.8,214.5z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/kelardasht" aria-label="ورود به فرمانداری کلاردشت" data-county="kelardasht" tabindex="0" class="county-region" @mouseenter="selected='kelardasht'" @focus="selected='kelardasht'" :class="{'is-selected':selected==='kelardasht'}">
<title>فرمانداری کلاردشت</title>
<path class="city" d="M172.5,181.2c6.2-7.8,3.6-15.6-3.6-20.8c-2.1-1.6-1.6-4.7-0.5-6.2c4.2-6.2,8.8-13,4.2-19.3 c-3.8-5.7-2.9-12.5,0.3-17.8c-5.7-1.5-10.8-4.9-13.4-10.3c-0.9-1.9-1.4-3.9-2-5.9c-0.9,0.4-2,0.6-3.2,0.7c-7.3,1-12,5.7-17.7,9.9 c-0.4,0.3-0.8,0.5-1.2,0.6c-3.5,6.8-13.1,13.3-22.7,6.1c-3.1-2.6-10.9,2.6-8.3,7.3c1,1.6,3.7,2.6,3.7,4.2 c0.9,11.6,3.5,25-2.7,35.5c6.1,3.4,12,6.8,14.8,9c6.2,5,27.4,10.2,34.3,11.9l1.3,0.3c2.9,0.7,9.5,1.5,15.9,2.1 C170.6,185.7,171.2,182.9,172.5,181.2z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/neka" aria-label="ورود به فرمانداری نکا" data-county="neka" tabindex="0" class="county-region" @mouseenter="selected='neka'" @focus="selected='neka'" :class="{'is-selected':selected==='neka'}">
<title>فرمانداری نکا</title>
<path class="city" d="M579.6,124.5c-1.9-1.6-4.1,1.3-6,1.9c-4.1,1.3-11.3-0.6-11.3-4.1c0.9-12-11-14.8-19.2-18 c-4.1-1.6-8.8,0.6-12.9,2.5c-1.3,0.6-3.8-0.9-3.8-2.5c0.3-2.5,1.3-5.4-1.6-6.3c-5.7-2.2-14.8,2.2-16.7-5 c-1.3-5.7,4.7-10.4,0.9-16.1c-4.1-6-10.7-6.9-17-8.5c-0.6-0.3-1.6-0.9-1.9-1.6c-2.2-4.3,1.7-9.8-1.7-13.3l-8.8,1.9 c4.2,5.9,7,13.8,4.6,20.1c-1,3.1,2.1,5.2,3.6,7.8c1,3.1-1.6,5.2-3.1,7.8c-0.5,1.6,0,3.1,0.5,4.7c3.6,6.2,12,8.8,10.9,17.7 c-0.5,1,1,2.1,2.1,2.6c12.5,1,19.8,13,22.4,23.9c-0.1,0-0.1,0-0.2,0.1c3.6,4.5,6,10,9.6,14c7.3,7.8,19.8,6.2,29.1,0 c3.1-2.1,7.8,2.1,11.5-0.5c7.2-4.2,14.8-8.5,22.9-7.9c0.2-0.8,0.5-1.5,0.7-2c1.6-4.2,5.1-9.6,9.4-10.6c3.6-0.9,7.4-2.1,10.8-3.4 c0.1,0,0.2-0.1,0.3-0.1c-1.2-0.8-2.5-1.4-3.9-1.5C600.7,127.3,589.4,131.8,579.6,124.5z" vector-effect="non-scaling-stroke">
</path>
</a>
<a href="/behshahr" aria-label="ورود به فرمانداری بهشهر" data-county="behshahr" tabindex="0" class="county-region" @mouseenter="selected='behshahr'" @focus="selected='behshahr'" :class="{'is-selected':selected==='behshahr'}">
<title>فرمانداری بهشهر</title>
<path class="city" d="M625.4,106c-0.9-2.1-2.1-3.3-3.8-3.9c-3.8-1.3-9.4-3.4-14.3-5.4c-7.3,1.7-14.3,6.2-21.6,8.5 c-9.9,2.6-16.7-3.6-17.7-13.5c0-0.5-0.5-2.1-1.6-2.1c-7.8,1-19.3-0.5-17.2-10.9c0.5-2.1,4.2-3.1,4.2-5.2 c0.9-5.5,2.7-11.5,7.7-13.8h-0.3l-6.7-2.8l-3.9-5l1.4-0.3l3.4-0.8l-5.6,0.3l-2.2-0.8l-1.1-2.2h8.4l9.5,1.4l2.5-0.6l4.5-1.7 l2.5-0.3l4.5,1.1l2.2,0.3l2-0.8l7.6-2.2l11.8-1.4l9.3-3.1l0.3-7.3l-7.9,6.4l-11.8,2.5l-64.8,3.7l-7.3,1.1l-30.9,6.5 c3.4,3.5-0.5,9,1.7,13.3c0.3,0.6,1.3,1.3,1.9,1.6c6.3,1.6,12.9,2.5,17,8.5c3.8,5.7-2.2,10.4-0.9,16.1c1.9,7.2,11,2.8,16.7,5 c2.8,0.9,1.9,3.8,1.6,6.3c0,1.6,2.5,3.2,3.8,2.5c4.1-1.9,8.8-4.1,12.9-2.5c8.2,3.2,20.2,6,19.2,18c0,3.5,7.2,5.4,11.3,4.1 c1.9-0.6,4.1-3.5,6-1.9c9.8,7.2,21.1,2.8,31.2,3.5c1.4,0.2,2.7,0.7,3.9,1.5c4.9-2,8.8-4.3,10-6.5 C626.4,119.4,627.5,111.2,625.4,106z" vector-effect="non-scaling-stroke">
</path>
</a>
</g>
<g class="county-connection-layer" aria-hidden="true">
<g data-connection-county="ramsar" :class="{'is-selected':selected==='ramsar'}">
<path class="county-label-leader" d="M54.4 48.3 L47.89 19" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="54.4" cy="48.3" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="abbasabad" :class="{'is-selected':selected==='abbasabad'}">
<path class="county-label-leader" d="M139.8 91.8 L133.34 29" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="139.8" cy="91.8" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="chalus" :class="{'is-selected':selected==='chalus'}">
<path class="county-label-leader" d="M174.4 103 L195.25 68" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="174.4" cy="103" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="mahmudabad" :class="{'is-selected':selected==='mahmudabad'}">
<path class="county-label-leader" d="M327.6 103 L307.7 48" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="327.6" cy="103" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="fereydunkenar" :class="{'is-selected':selected==='fereydunkenar'}">
<path class="county-label-leader" d="M365.5 91.3 L356.37 5" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="365.5" cy="91.3" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="babolsar" :class="{'is-selected':selected==='babolsar'}">
<path class="county-label-leader" d="M396.1 89 L406.83 45" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="396.1" cy="89" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="juybar" :class="{'is-selected':selected==='juybar'}">
<path class="county-label-leader" d="M431.5 87.7 L457.86 5" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="431.5" cy="87.7" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="simorgh" :class="{'is-selected':selected==='simorgh'}">
<path class="county-label-leader" d="M413.6 108 L390.5 112.75" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="413.6" cy="108" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="savadkuh-shomali" :class="{'is-selected':selected==='savadkuh-shomali'}">
<path class="county-label-leader" d="M434.7 155.5 L556 168.6" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="434.7" cy="155.5" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="galugah" :class="{'is-selected':selected==='galugah'}">
<path class="county-label-leader" d="M568 74.7 L583.5 82.77" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="568" cy="74.7" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="miandorud" :class="{'is-selected':selected==='miandorud'}">
<path class="county-label-leader" d="M504.4 131.5 L524.75 14" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="504.4" cy="131.5" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
<g data-connection-county="qaemshahr" :class="{'is-selected':selected==='qaemshahr'}">
<path class="county-label-leader" d="M423.6 128.9 L409 171 L421.61 181" vector-effect="non-scaling-stroke">
</path>
<circle class="county-label-dot" cx="423.6" cy="128.9" r="2.4" vector-effect="non-scaling-stroke">
</circle>
</g>
</g>
<g class="county-label-layer" aria-hidden="true">
<a href="/ramsar" tabindex="-1" class="county-map-label" data-label-county="ramsar">
<rect class="county-label-box" x="22.5" y="-7" width="45" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="45" y="6" text-anchor="middle" dominant-baseline="central" direction="rtl">رامسر</text>
</a>
<a href="/tonekabon" tabindex="-1" class="county-map-label" data-label-county="tonekabon">
<rect class="county-label-box" x="63" y="90" width="48" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="87" y="103" text-anchor="middle" dominant-baseline="central" direction="rtl">تنکابن</text>
</a>
<a href="/abbasabad" tabindex="-1" class="county-map-label" data-label-county="abbasabad">
<rect class="county-label-box" x="100" y="3" width="64" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="132" y="16" text-anchor="middle" dominant-baseline="central" direction="rtl">عباس‌آباد</text>
</a>
<a href="/chalus" tabindex="-1" class="county-map-label" data-label-county="chalus">
<rect class="county-label-box" x="176.5" y="42" width="53" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="203" y="55" text-anchor="middle" dominant-baseline="central" direction="rtl">چالوس</text>
</a>
<a href="/noshahr" tabindex="-1" class="county-map-label" data-label-county="noshahr">
<rect class="county-label-box" x="188.5" y="128" width="47" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="212" y="141" text-anchor="middle" dominant-baseline="central" direction="rtl">نوشهر</text>
</a>
<a href="/mahmudabad" tabindex="-1" class="county-map-label" data-label-county="mahmudabad">
<rect class="county-label-box" x="268" y="22" width="70" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="303" y="35" text-anchor="middle" dominant-baseline="central" direction="rtl">محمودآباد</text>
</a>
<a href="/amol" tabindex="-1" class="county-map-label" data-label-county="amol">
<rect class="county-label-box" x="288.5" y="219" width="33" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="305" y="232" text-anchor="middle" dominant-baseline="central" direction="rtl">آمل</text>
</a>
<a href="/fereydunkenar" tabindex="-1" class="county-map-label" data-label-county="fereydunkenar">
<rect class="county-label-box" x="321" y="-21" width="68" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="355" y="-8" text-anchor="middle" dominant-baseline="central" direction="rtl">فریدونکنار</text>
</a>
<a href="/babolsar" tabindex="-1" class="county-map-label" data-label-county="babolsar">
<rect class="county-label-box" x="386.5" y="19" width="47" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="410" y="32" text-anchor="middle" dominant-baseline="central" direction="rtl">بابلسر</text>
</a>
<a href="/juybar" tabindex="-1" class="county-map-label" data-label-county="juybar">
<rect class="county-label-box" x="438.5" y="-21" width="47" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="462" y="-8" text-anchor="middle" dominant-baseline="central" direction="rtl">جویبار</text>
</a>
<a href="/simorgh" tabindex="-1" class="county-map-label" data-label-county="simorgh">
<rect class="county-label-box" x="339.5" y="105" width="51" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="365" y="118" text-anchor="middle" dominant-baseline="central" direction="rtl">سیمرغ</text>
</a>
<a href="/babol" tabindex="-1" class="county-map-label" data-label-county="babol">
<rect class="county-label-box" x="365" y="165" width="34" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="382" y="178" text-anchor="middle" dominant-baseline="central" direction="rtl">بابل</text>
</a>
<a href="/savadkuh" tabindex="-1" class="county-map-label" data-label-county="savadkuh">
<rect class="county-label-box" x="403" y="215" width="60" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="433" y="228" text-anchor="middle" dominant-baseline="central" direction="rtl">سوادکوه</text>
</a>
<a href="/savadkuh-shomali" tabindex="-1" class="county-map-label" data-label-county="savadkuh-shomali">
<rect class="county-label-box" x="556" y="161" width="100" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="606" y="174" text-anchor="middle" dominant-baseline="central" direction="rtl">سوادکوه شمالی</text>
</a>
<a href="/sari" tabindex="-1" class="county-map-label is-selected" data-label-county="sari">
<rect class="county-label-box" x="488.5" y="172" width="43" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="510" y="185" text-anchor="middle" dominant-baseline="central" direction="rtl">ساری</text>
</a>
<a href="/galugah" tabindex="-1" class="county-map-label" data-label-county="galugah">
<rect class="county-label-box" x="583.5" y="82" width="47" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="607" y="95" text-anchor="middle" dominant-baseline="central" direction="rtl">گلوگاه</text>
</a>
<a href="/miandorud" tabindex="-1" class="county-map-label" data-label-county="miandorud">
<rect class="county-label-box" x="494" y="-12" width="66" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="527" y="1" text-anchor="middle" dominant-baseline="central" direction="rtl">میاندورود</text>
</a>
<a href="/qaemshahr" tabindex="-1" class="county-map-label" data-label-county="qaemshahr">
<rect class="county-label-box" x="408" y="181" width="60" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="438" y="194" text-anchor="middle" dominant-baseline="central" direction="rtl">قائم‌شهر</text>
</a>
<a href="/nur" tabindex="-1" class="county-map-label" data-label-county="nur">
<rect class="county-label-box" x="258" y="155" width="28" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="272" y="168" text-anchor="middle" dominant-baseline="central" direction="rtl">نور</text>
</a>
<a href="/kelardasht" tabindex="-1" class="county-map-label" data-label-county="kelardasht">
<rect class="county-label-box" x="106.5" y="138" width="63" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="138" y="151" text-anchor="middle" dominant-baseline="central" direction="rtl">کلاردشت</text>
</a>
<a href="/neka" tabindex="-1" class="county-map-label" data-label-county="neka">
<rect class="county-label-box" x="538" y="118" width="28" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="552" y="131" text-anchor="middle" dominant-baseline="central" direction="rtl">نکا</text>
</a>
<a href="/behshahr" tabindex="-1" class="county-map-label" data-label-county="behshahr">
<rect class="county-label-box" x="526" y="35" width="48" height="26" rx="5" vector-effect="non-scaling-stroke">
</rect>
<text class="city-label" x="550" y="48" text-anchor="middle" dominant-baseline="central" direction="rtl">بهشهر</text>
</a>
</g>
</svg>
</div>
<div class="portal-county-picker">
<label for="_R_0_-select">انتخاب فرمانداری</label>
<select id="_R_0_-select" x-model="selected">
<option value="ramsar">رامسر</option>
<option value="tonekabon">تنکابن</option>
<option value="abbasabad">عباس‌آباد</option>
<option value="chalus">چالوس</option>
<option value="noshahr">نوشهر</option>
<option value="mahmudabad">محمودآباد</option>
<option value="amol">آمل</option>
<option value="fereydunkenar">فریدونکنار</option>
<option value="babolsar">بابلسر</option>
<option value="juybar">جویبار</option>
<option value="simorgh">سیمرغ</option>
<option value="babol">بابل</option>
<option value="savadkuh">سوادکوه</option>
<option value="savadkuh-shomali">سوادکوه شمالی</option>
<option value="sari" selected="">ساری</option>
<option value="galugah">گلوگاه</option>
<option value="miandorud">میاندورود</option>
<option value="qaemshahr">قائم‌شهر</option>
<option value="nur">نور</option>
<option value="kelardasht">کلاردشت</option>
<option value="neka">نکا</option>
<option value="behshahr">بهشهر</option>
</select>
<a class="portal-button" href="/sari" :href="'/'+selected">ورود به فرمانداری</a>
</div>
<details class="portal-county-directory">
<summary>فهرست همهٔ فرمانداری‌ها</summary>
<div class="portal-county-list">
<a href="/ramsar">رامسر</a>
<a href="/tonekabon">تنکابن</a>
<a href="/abbasabad">عباس‌آباد</a>
<a href="/chalus">چالوس</a>
<a href="/noshahr">نوشهر</a>
<a href="/mahmudabad">محمودآباد</a>
<a href="/amol">آمل</a>
<a href="/fereydunkenar">فریدونکنار</a>
<a href="/babolsar">بابلسر</a>
<a href="/juybar">جویبار</a>
<a href="/simorgh">سیمرغ</a>
<a href="/babol">بابل</a>
<a href="/savadkuh">سوادکوه</a>
<a href="/savadkuh-shomali">سوادکوه شمالی</a>
<a href="/sari" aria-current="true">ساری</a>
<a href="/galugah">گلوگاه</a>
<a href="/miandorud">میاندورود</a>
<a href="/qaemshahr">قائم‌شهر</a>
<a href="/nur">نور</a>
<a href="/kelardasht">کلاردشت</a>
<a href="/neka">نکا</a>
<a href="/behshahr">بهشهر</a>
</div>
</details>
</div>
</div>
</div>