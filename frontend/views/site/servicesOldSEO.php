<?php
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use common\widgets\Alert;
    use yii\bootstrap4\ActiveForm;

    $this->title = $model->name;
    $this->params['breadcrumbs'][] = $this->title;
    $request = Yii::$app->request;
    $current = \common\models\Lang::getCurrent();
    $lang = $current->url;

    if ($lang == 'ru' and $id == 8) {
        $this->title = 'Экспресс почта по Узбекистану | BTS Express';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express предлагает вам быструю доставку грузов по городу Ташкенту и Узбекистана, курьерские услуги, экспресс доставка, экспресс доставка по Узбекистану.']);
    } elseif ($lang == 'ru' and $id == 9) {
        $this->title = 'Комплексная логистика | BTS Express почтовые службы';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Комплексная логистика, таможенное оформление, услуги международной перевозки, логистические услуги, транспорт логистика и вся документация']);
    } elseif ($lang == 'ru' and $id == 10) {
        $this->title = 'Курьерская служба | BTS EXPRESS почтовые службы';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express Курьерская служба Ташкент и курьерская служба по Узбекистану. Быстрая и надежная доставка по вашему городу. Круглосуточная доставка.']);
    } elseif ($lang == 'ru' and $id == 12) {
        $this->title = 'Складские услуги | BTS Express почтовые службы';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express предоставляет складские услуги, хранение товаров в надежном складе, прием отправка на складах']);
    } elseif ($lang == 'ru' and $id == 13) {
        $this->title = 'E-COMMERSE | Электронная коммерция BTS EXPRESS';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS EXPRESS E-COMMERSE (Электронная торговля) онлайн транзакции, развиты Электронная торговля) онлайн транзакции, развиты услуги электронного обмена данными']);
    } elseif ($lang == 'ru' and $id == 22) {
        $this->title = 'Международная доставка | BTS Express доставки за границу';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Международная служба доставки BTS 
            Express отправляйте или получите письма, документы, товары или грузы в любую точку мира в кратчайшие сроки!']);
    } elseif ($lang == 'ru' and $id == 23) {
        $this->title = 'Индивидуальная доставкая | BTS Express почтовые службы';
        $this->registerMetaTag(['name' => 'description', 'content' => 'Индивидуальная доставка – перевозка вашего груза отдельным транспортном. Доставка по Узбекистану на дом, средством по заданному маршруту']);
    } elseif ($lang == 'uz' and $id == 1) {
        $this->title = 'Ekspress Pochta | Xalqaro BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent,
            O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, yukllarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 2) {
        $this->title = 'Kompleks logistika | Xalqaro BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent,
            O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, logistika, yuklarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 3) {
        $this->title = 'Kuryer xizmati | Xalqaro BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent,
            O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, logistika, yuklarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 4) {
        $this->title = 'Xalqaro yetkazib berish | Xalqaro BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent, O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, logistika, yuklarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 5) {
        $this->title = 'Sklad xizmati | BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent, O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, logistika, yuklarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 6) {
        $this->title = 'E-COMMERSE | BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => ' BTS Express xalqaro express pochta kompaniyasidan Toshkent, O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati hujjatlar, logistika, yuklarni yetkazib berish.']);
    } elseif ($lang == 'uz' and $id == 7) {
        $this->title = 'Individual yuk tashish | BTS Express pochta xizmatlari';
        $this->registerMetaTag(['name' => 'description', 'content' => 'BTS Express xalqaro express pochta kompaniyasidan Toshkent, O‘zbekiston va Xalqaro tezkor kuryerlik xizmatlari, express pochta xizmati, hujjatlar, logistika, individual yuk tashish yuklarni yetkazib berish.']);
    }
?>
<style type="text/css">
    .page-wrap .sidebar ul li.active a {
        color: #ee6800;
    }
    .primary .content-txt ul li:last-child::before {
        content: "";
        padding-left: 0;
    }
    @media screen and (max-width: 768px) {
        .page-wrap .sidebar ul li a {
            padding: 12px 0;
        }
    }
</style>
<section class="page-wrap">
    <div class="container-xl">
        <div class="row">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <?= Html::a(Yii::t('app', 'home'), ['site/index'])?>
                    </li>
                    <li>
                        <?= Html::a(Yii::t('app', 'services'), ['site/services'])?>
                    </li>
                    <li>
                        <?= Html::a($model->name, ['site/service', 'id' => $model->id])?>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="sidebar">
                    <ul>
                        <?php foreach ($services as $service): ?>
                        <li <?php if ($id == $service->id): ?>class="active"<?php endif ?>>
                            <?= Html::a($service->name, ['site/service', 'id' => $service->id])?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <div class="primary">
                    <div class="primary_title">
                        <h4><?= $model->name ?></h4>
                    </div>
                    <?= Alert::widget() ?>
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="thumb-img">
                                <picture><source srcset="/img/services/<?= $model->image ?>" type="image/webp"><img src="/img/services/<?= $model->image ?>" alt=""></picture>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <?php if ($lang == 'uz' and $id == 1): ?>
                                <div class="content-txt">
                                    <h1>Ekspress pochta</h1>
                                    <p style="text-align: justify;">
                                        <a href="https://bts.uz/uz">BTS Express</a> kompaniyasi har bir mijoz uchun yuqori darajadagi xizmat ko'rsatish
                                        standartlariga qat'iy rioya qilib, o'z vaqtida va kafolatli yetkazib berishni ta'minlaydi.
                                    </p>
                                    <p style="text-align: justify;">
                                        Biznes hujjatlari, shartnomalar va xatlarni o‘z vaqtida express pochta xizmati yetkazib berish, biznes hamkorlar bilan yaxshi munosabatlar o‘rnatishda muhim nuqta hisoblanadi. BTS Express cargo service kompaniyasi o'sha kuni tezkor pochta yetkazib berish xizmatlarini taqdim etadi - qabul qiluvchi sizning jo'natishingizni o'sha kuni yoki ertasi kuni oladi.
                                    </p>
                                    <p style="text-align: justify;">
                                        BTS Express sizga O'zbekistondagi yuklarnini tezkor yetkazib berish, shu jumladan
                                        mamlakatning eng chekka burchaklarida, shuningdek eshikdan eshikgacha yoki tezkor    yetkazib berish xizmatlarini taklif qiladi.
                                    </p>
                                    <p style="text-align: justify;">
                                        Bizning asosiy ustunligimiz - pochta jo'natmalarini tezkor yetkazib berish shartlari - kechayu kunduz jo'natish, nafaqat tezlik, balki etkazib berish xarajatlari bo'yicha ham eng yaxshi variantdir.
                                    </p>
                                    <p style="text-align: justify;">
                                        BTS Express O'zbekistonning 60 ta aholi punktlarida joylashgan bo'lib, sizning qulayligingiz uchun 24/7 ish rejimida faoliyat ko'rsatamiz.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 2): ?>
                                <div class="content-txt">
                                    <h1>Kompleks logistika</h1>
                                    <p style="text-align: justify;">
                                        <a href="https://bts.uz/uz">BTS Express</a> kompaniyasi logistika sohasi bo’yicha kompleks xizmatlarni sizga taqdim etadi. Kompleks logistika xizmatimiz ichiga quyidagilar kiradi Logistika operatorining maqsadi buyurtma xizmatining aylanishining uzluksizligi va tezlashishini ta'minlashdir:
                                    </p>
                                    <ul>
                                        <li>Bojxona rasmiylashtiruvi</li>
                                        <li>Barcha hujjatlashtirish ishlari</li>
                                        <li>Sertifikat olish</li>
                                        <li>Hujjatlarni chet elga yetkazib berish</li>
                                        <li>O'zbekistonda kuryerlik xizmatlari</li>
                                        <li><a href="https://bts.uz/uz/service?id=2">Toshkentda logistika xizmatlari</a></li>
                                        <li>Transport logistikasi</li>
                                        <li><a href="https://bts.uz/uz/service?id=4">Xalqaro transport xizmatlari.</a></li>
                                        <li>va boshqalar</li>
                                    </ul>
                                    <p style="text-align: justify;">
                                        O'zbekiston biznesining asosiy muammolaridan biri - logistikadir. Ko'pincha, korxonalar
                                        muvaffaqiyatining muhim mezonlaridan biri - bu tovarlarni import va eksport qilishda sifatli va o‘z vaqtida amalga oshirilishi hisoblanadi. Bu muammolarni yechim qidirayotgan bo'lsangiz, Biz bilan hamkorlik qilishni taklif qilamiz!
                                    </p>
                                    <p style="text-align: justify;">
                                        Bugungi kunda, Biz «BTS Express» yirik avtotransport vositalariga egamiz va quyidagi yuk turlarini tashiymiz:
                                    </p>
                                    <ul>
                                        <li>Tibbiyot uskunalari va dorilar</li>
                                        <li>Katta hajmdagi qurilish materiallari</li>
                                        <li>Ishlab chiqarish uskunalari</li>
                                        <li>Turli xil kategoriyadagi xavfli yuklarni</li>
                                        <li>Oziq-ovqat mahsulotlari</li>
                                        <li>Aniq bir haroratni talab qiluvchi yuklarni</li>
                                        <li>Suyuqlik yuklarni</li>
                                        <li>va boshqa turdagi yuklarni</li>
                                    </ul>
                                    <p style="text-align: justify;">
                                        BTS Express bilan birga mijoz xavflarni sezilarli darajada kamaytiradi, jo'natishlarning umumiy sonining o'sishi uchun moliyaviy, logistika va tashkiliy yordam oladi, bu umumiy daromadni sezilarli darajada oshiradi, mutlaq va nisbiy ishlash ko'rsatkichlariga ijobiy ta'sir qiladi.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 3): ?>
                                <div class="content-txt">
                                    <h1>Kuryer xizmati</h1>
                                    <p style="text-align: justify;">
                                        Har kuni butunlay boshqacha odamlar yordamisiz muhim narsani qilishga vaqtlari yo'qligini
                                        tushunadigan vaziyatga tushib qolishadi: Toshkentda kuryerlik yetkazib berish xizmati
                                        allaqachon mavjud bo‘lsa-da, ular sizni tushkunlikka solib qo‘ysa, siznig vaqtingizni oladi.
                                        Kompaniyamiz- BTS Express O'zbekiston Respublikasi hududida tezkor pochta  <a href="https://bts.uz/uz/service?id=2">xizmati, logistika</a> va  <a href="https://bts.uz/uz/service?id=4">xalqaro yuklarnini yetkazib berish </a> xizmatlarini taqdim etadi.
                                    </p>
                                    <p style="text-align: justify;">
                                        Bizning vazifamiz- sizning har qanday jo'natmalaringizni yoki yukingizni biz qabul qilgan kundan boshlab 24 soat ichida eng maqbul narxlarda o'zingiz ko'rsatgan joyga tez va ishonchli yetkazib berishni ta'minlash.
                                    </p>
                                    <p style="text-align: justify;">
                                        Endi yuklarni uyingizdan yoki ofisingizdan olib ketib belgilagan manzilingizgacha yetkazib
                                        beramiz.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 4): ?>
                                <div class="content-txt">
                                    <h1>Xalqaro yetkazib berish</h1>
                                    <p style="text-align: justify;">
                                        Zamonaviy dunyoda, yuqori tezlikda, bizni hammamiz kutishga tayor, bu mahsulotlar va
                                        hujjatlarni yetkazib berishga ham tegishli. <a href="https://bts.uz/uz">BTS Express</a> xalqaro kuryerlik yetkazib berish xizmati odamlar va kompaniyalarning yaqinlashishiga yordam beradi, o'zaro munosabatlar uchun
                                        maqul sharoitlarni yaratadi. BTS Exspress tezkor yetkazib berish bozorida yetakchilardan biri
                                        hisoblanadi. 89 mamlakat va hududlardagi vakolatxonalarning keng tarmog'i bizga har qanday
                                        vazifalarni hal qilish imkonini beradi. Bizning asosiy ustunligimiz - etkazib berishning minimal muddati. To'g'ri qurilgan logistika marshrutlari bizga tashish vaqtini qisqartirish imkonini beradi. Hujjatlar va yuklarnini chet elga xalqaro yetkazib berish bizning ishimiz bo'lib, biz bunga professional va mas'uliyat bilan yondashamiz. Siz, nafaqat butun mamlakat, balki butun dunyo bo'ylab pochtangizni yuborish yoki qabul qilishni bizning kompaniyamizga ishonib topshirishingiz mumkin!
                                    </p>
                                    <p style="text-align: justify;">
                                        «BTS Express»<a href="https://bts.uz/uz/service?id=4">Xalqaro jo'natmalari</a> xizmati bilan xatlar, hujjatlar, tovarlar yoki yuklarnini
                                        dunyoning istalgan nuqtasiga, eng qisqa vaqt ichida, yuborish yoki qabul qilishingiz mumkin!
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 5): ?>
                                <div class="content-txt">
                                    <h1>Sklad xizmati</h1>
                                    <p style="text-align: justify;">
                                        Tovarlarni, yuklarnini mas'uliyatli saqlash <a href="https://bts.uz/uz/service?id=4">logistika operatorlari</a> tomonidan ko'rsatiladigan asosiy xizmat turi hisoblanadi, chunki u tovarlarni qabul qilish, texnik xizmat ko'rsatish va tushirish bo'yicha asosiy ishlarni o'z ichiga oladi. Omborga texnik xizmat ko'rsatishning ushbu turi yuk va saqlashning to'liq xavfsizligini ta'minlaydi, omborni qidirish va tovarlarni joylashtirish  uchun maqul variant sifatida lekin yaxshiroq shartlarda. Tovarlaringizni saqlash biz bilan qulayroq va foydaliroq! Kompaniyamiz omborxona xizmatlarini taqdim etadi. Xizmatni ichiga nafaqat tovarlaringizni qutida qabul qilish, <a href="https://bts.uz/uz/service?id=1">exspress pochta jo'natish</a>, xavfsiz va ishonchli omborxonada saqlash kiradi, balki transport xarajatlari uchun mablag'ingizni tejash imkonini ham beradi!
                                    </p>
                                    <p style="text-align: justify;">
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 6): ?>
                                <div class="content-txt">
                                    <h1>E-COMMERSE</h1>
                                    <p style="text-align: justify;">
                                        Bugungi kunda elektron tijorat onlayn xizmatlar yoki Internet orqali tovarlarni elektron xarid qilish yoki sotish, mobil tijorat, elektron pul o'tkazmalari, ta'minot zanjirini boshqarish, Internet-marketing, onlayn tranzaktsiyalarni qayta ishlash, elektron ma'lumotlar almashinuvi, inventarni boshqarish tizimlari va ma'lumotlarni yig'ishning avtomatlashtirilgan tizimlari.
                                    </p>
                                    <p style="text-align: justify;">
                                        Onlayn-do'konlar uchun bizning <a href="https://bts.uz/">BTS Express</a> kompaniyamiz endi "Mahsulotlarni yetkazib
                                        berish va qaytarish" kabi yangi xizmatini ishga tushirdi.
                                    </p>
                                    <p style="text-align: justify;">
                                        Endi yetkazib berish uchun to'lovni amalga oshirish yanada oson va foydaliroq bo'ladi! Avval
                                        mahsulotingizni olasiz va shundan keyingina olingan mahsulot uchun to'lovni amalga oshirasiz.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'uz' and $id == 7): ?>
                                <div class="content-txt">
                                    <h1>Individual yuk tashish</h1>
                                    <p style="text-align: justify;">
                                        Biz har bir mijozni qadrlaymiz, agar standart yetkazib berish variantlari sizni qoniqtirmasa,
                                        biz har doim sizga <a href="https://bts.uz/uz/service?id=7">individual yuk tashish</a> xizmatini ko“rsatamiz. Ko'pincha biz tovarlarni buyurtmadan keyingi bir necha soat ichida etkazib beramiz. Biz mollarni xonagacha yetqazib beramiz. Individual va tez yetkazib berish har doim ham qo'shimcha to'lovni anglatmaydi.
                                    </p>
                                    <p style="text-align: justify;">
                                        <a href="https://bts.uz/uz">BTS Express<a> kompaniyasi barcha xizmatlari bilan bir qatorda nostandart tartibdagi yuklarnini
                                        ham o’z manzillariga yetkazib beradi. agar sizning yukingiz tashish tartibi bizning
                                        xizmatlarimizga kiritilmagan bo’lsa ham bizga murojaat qilishingiz mumkin, siz uchun individual sharoit yaratib beramiz.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 8): ?>
                                <div class="content-txt">
                                    <h1>Экспресс почта</h1>
                                    <p style="text-align: justify;">
                                        <a href="https://bts.uz/uz">BTS EXPRESS<a> - экспресс почта в Узбекистане, которая обеспечивает быструю и надёжную доставку грузов по стране, включая отдаленные районы Узбекистана. Экспресс доставка гарантирует высококачественное обслуживание, придерживаясь международных стандартов услуг перевозки.  BTS экспресс почта предоставляет своевременные внутренние курьерские услуги в Узбекистане, в том числе доставку «от двери до двери». Для удобства наших клиент в наша сеть готова оказывать круглосуточные услуги в 68 рабочих пунктов страны, работая без  выходных.
                                    </p>
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 9): ?>
                                <div class="content-txt">
                                    <h1>Комплексная логистика</h1>
                                    <p style="text-align: justify;">
                                        Комплексная логистика - представляет собой системный подход к организации жизненного цикла 
                                        товаров и связанных с ними действий в период с момента изготовления их составных частей до 
                                        момента потребления.
                                    </p>
                                    <p>
                                        <a href="https://bts.uz/uz">BTS EXPRESS</a> предлагает комплекс услуг по логистике, в который входит:
                                    </p>
                                     <ul>
                                        <li>Таможенное оформление</li>
                                        <li>Документация</li>
                                        <li>Сертификация</li>
                                        <li>Доставка документов за границу</li>
                                        <li>Курьерские услуги по Узбекистану</li>
                                        <li>Логистические услуги в Ташкенте</li>
                                        <li>
                                            <a href="https://bts.uz/ru/service?id=9">Транспортная логистика.</a>
                                        </li>
                                        <li>
                                            <a href="https://bts.uz/ru">Услуги международной перевозки.</a>
                                        </li>
                                        <li>И т.д.</li>
                                    </ul>
                                    <p>
                                        Мы стремимся к превосходному обслуживанию, своевременно удовлетворив наших клиентов, а 
                                        также их требований к срочной международной грузоперевозки. Вы можете полагаться на опыт 
                                        наших офисных сотрудников и на нашу профессиональную команду водителей. 
                                        В сегодняшний день наша экспресс доставка предлагает перевозки следующих видов товаров:
                                    </p>
                                    <ul>
                                        <li>Медицинские оборудование и медикаменты</li>
                                        <li>Крупномасштабные строительные материалы</li>
                                        <li>Производственное оборудование</li>
                                        <li>Опасные грузы различных категорий</li>
                                        <li>Продукты питания</li>
                                        <li>Каждая загрузка требует разной температуры</li>
                                        <li>Жидкие нагрузки</li>
                                        <li>и все другие нагрузки.</li>
                                    </ul>
                                    <p>
                                        Эффективная система управления материальными, информационными и финансовыми потоками, 
                                        связанными с жизненным циклом товаров. Комплексный подход к логистическому процессу 
                                        позволяет снизить или нейтрализовать риск неопределенности, влияющей на функциональный 
                                        жизненный цикл товаров.
                                    </p>    
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 10): ?>
                                <div class="content-txt">
                                    <h1>Курьерская служба</h1>
                                    <p style="text-align: justify;">
                                       <a href="https://bts.uz/ru">BTS EXPRESS</a> предлагает <a href="https://bts.uz/ru/service?id=9">транспортную логистику</a>, быструю почту на территории Узбекистан, услуги курьера и <a href="https://bts.uz/ru/service?id=22">международные перевозки</a> грузов по самым приемлемым ценам.
                                    </p>
                                    <p>
                                        Чтобы своевременно выполнить срочные доставки, мы предоставляем курьерские услуги в точно 
                                        указанное место, в течение 24 часов с момента получения заказа. С помощью услуги «от двери до  двери» вы можете передать или получить ваши посылки не выходя из дома. Теперь мы заберем 
                                        товар из вашего дома или офиса и доставим по указанному вами адресу.
                                    </p>    
                                    <p>
                                        Наша миссия - обеспечить быструю и надежную доставку любых ваших отправлений или грузов с 
                                        момента получения в указанное вами место по наиболее приемлемым ценам.
                                    </p>       
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 12): ?>
                                <div class="content-txt">
                                    <h1>Складские услуги</h1>
                                    <p style="text-align: justify;">
                                        <a href="https://bts.uz/ru">BTS EXPRESS</a> предлагает хранение ваших товаров в надежных складах. Складские услуги 
                                        подразумевают не только прием и отправку товара в ящике, но и сэкономить средства на 
                                        транспортные расходы. Это делает нашу службу доставки еще проще и выгоднее. Мы являемся 
                                        вашим универсальным партнером по всем складских услуг. У нас есть складские помещения 
                                        мирового класса и большой опыт в закупке, хранении, обработке, упаковке и отправке товаров.
                                    </p>      
                                </div>
                            
                            <?php elseif ($lang == 'ru' and $id == 13): ?>
                                <div class="content-txt">
                                    <h1>E-COMMERCE</h1>
                                    <p style="text-align: justify;">
                                        Для интернет-магазинов наша компания <a href="https://bts.uz/ru">BTS Express</a> запустила новую услугу, такую как «Доставка 
                                        и возврат товара».
                                    </p>      
                                    <p>
                                        Услуги электронной коммерции охватывают все технологические потребности бизнеса электронной 
                                        коммерции. Компания BTS Express, поставка услуг электронной коммерции, предлагает широкий 
                                        спектр услуг в области электронной коммерция и может всесторонне удовлетворить разнообразные
                                        потребности вашего бизнеса. Оплачивать доставку теперь будет проще и выгоднее! Сначала вы 
                                        получите свой товар, и только после этого вы заплатите за полученный товар. BTS Express 
                                        предлагает решения для электронной коммерции, доставку в тот же день, по расписанию и по 
                                        запросу.
                                    </p>    
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 22): ?>
                                <div class="content-txt">
                                    <h1>Международная доставка</h1>
                                    <p style="text-align: justify;">
                                        Служба экспресс доставка также предоставляет международные <a href="https://bts.uz/ru/service?id=22">курьерские услуги</a> с гарантией 
                                        своевременной доставки, по наиболее выгодным ценам. Вы можете доверить нашей компании 
                                        отправку или получение вашей почты не только по всей стране, но и по всему миру! С 
                                        международной службой доставки «<a href="https://bts.uz/ru">BTS Express</a>» вы можете отправлять или получать письма, 
                                        документы, товары или грузы в любую точку мира в кратчайшие сроки! Служба экспресс доставка 
                                        также предоставляет международные курьерские услуги с гарантией своевременной доставки, по 
                                        наиболее выгодным ценам. С международной службой «BTS EXPRESS» теперь возможно отправить 
                                        документы за границу, доставить посылки, товары и грузы почти в 90 стран мира, за самые короткие 
                                        сроки.
                                    </p>      
                                    <p>
                                        BTS Express был создан для обеспечения простой, доступной и надежной международной доставки, 
                                        которая поможет вашему бизнесу процветать по всему миру.
                                    </p>    
                                </div>
                            <?php elseif ($lang == 'ru' and $id == 23): ?>
                                <div class="content-txt">
                                    <h1>Индивидуальная доставка</h1>
                                    <p style="text-align: justify;">
                                        Услуга индивидуальной доставки – это перевозка вашего груза по заданному маршруту 
                                        отдельным транспортным средством. Этот вид транспорта предназначен для крупногабаритных и 
                                        тяжеловесных грузов, больших партий товаров, а также для доставки в кратчайшие сроки.
                                    </p>      
                                    <p>
                                        Наряду со всеми своими услугами, BTS Express также осуществляет доставку грузов нестандартного заказа по своим адресам. Даже если процедура перевозки вашего груза не входит в наши услуги, вы можете связаться с нами, мы создадим для вас индивидуальные условия
                                    </p>    
                                </div>
                                
                            <?php else: ?>
                                <div class="content-txt">
                                    <?= $model->text ?>
                                </div>
                            <?php endif ?>
                            <?php $message->service = $model->name ?>
                            <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'calc-form']); ?>
                                <div class="row">
                                    <div class="col-md-4 col-lg-4">
                                        <?= $form->field($message, 'service')->dropDownList(ArrayHelper::map($services, 'name', 'name'), ['class' => '', 'prompt' => '---']) ?>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <?= $form->field($message, 'name')->textInput(['class' => '']) ?>
                                    </div>
                                    <div class="col-md-4 col-lg-4">
                                        <?= $form->field($message, 'phone')->textInput(['class' => '']) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <?= $form->field($message, 'captcha')->widget(\yii\captcha\Captcha::className(), [
                                            'options' => [
                                                'class' => '',
                                                'style' => 'margin-bottom: 0;'
                                            ],
                                            'template' => '<div class="row"><div class="col-lg-4" style="padding-right: 0; padding-top: 10px; margin-right: -20px;">{image}</div><div class="col-lg-8" style="padding: 0;">{input}</div></div>',
                                        ])->label(false)->hint(Yii::t('app', 'Hint: click on the equation to refresh')) ?>
                                    </div>
                                    <div class="col-md-6 col-lg-6 text-right">
                                        <button type="submit" class="submit-btn btn-success" style="float: none;"><?= Yii::t('app', 'send')?></button>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    $this->registerJs("
        $('#services-phone').mask('+998 00 000-00-00');
    ");
?>