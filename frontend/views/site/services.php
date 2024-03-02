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
    // vd($id);

    if ($lang == 'ru' and $id == 8) {
        $this->title = 'Экспресс почта в Ташкенте и Узбекистане: услуги экспресс доставки почты от BTS Express';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Экспресс почта в Ташкенте и Узбекистане. Желаете заказать услуги экспресс почты в Узбекистане? BTS Express предлагает услуги экспресс доставки почты по территории Узбекистана. Заказывайте услуги почтовой экспресс доставки «от двери до двери» по лучшим ценам на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'BTS Express в Узбекистане, Экспресс почта в Узбекистане, Экспресс почта в Ташкенте, доставка почты в Узбекистане, услуги экспресс доставки почты в Узбекистане, экспресс доставка почты в Ташкенте, услуги экспресс почты в Узбекистане, услуги экспресс доставки почты в Ташкенте, услуги почтовой экспресс доставки в Узбекистане, услуги почтовой доставки в Ташкенте, доставка почты экспресс методом в Узбекистане'
        ]);
    } elseif ($lang == 'ru' and $id == 9) {
        $this->title = 'Комплексная логистика в Ташкенте и Узбекистане: комплекс услуг по логистике на выгодных условиях от BTS';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Комплексная логистика в Ташкенте и Узбекистане. Нуждаетесь в комплексных логистических услугах? BTS предлагает широкий комплекс услуг по логистике на территории Ташкента, Узбекистана и по всему миру! Заказать комплекс логистических услуг по оптимальным ценам можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Комплексная логистика в Узбекистане, Комплексная логистика в Ташкенте, комплекс услуг по логистике в Узбекистане, комплекс логистических услуг в Ташкенте, комплексные логистические услуги в Узбекистане, логистические услуги в Ташкенте, услуги по логистике в Узбекистане, заказать комплекс услуг по логистике в Узбекистане, цена комплекса логистических услуг в Узбекистане'
        ]);
    } elseif ($lang == 'ru' and $id == 10) {
        $this->title = 'Курьерская служба в Ташкенте и Узбекистане: курьерские услуги по доставке грузов и почты от BTS';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Курьерская служба в Ташкенте и Узбекистане. Ищете надежную курьерскую службу доставки в Узбекистане? BTS предлагает курьерские услуги по доставке грузов и почты на территории Узбекистана. Заказать услуги курьерской доставки в точно указанное место по доступным ценам можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Курьерская служба в Узбекистане, курьерские услуги в Ташкенте, курьерская служба в Узбекистане, курьерские услуги по доставке грузов в Узбекистане, курьерские услуги по доставке почты в Узбекистане, услуги курьерской доставки в Ташкенте, услуги курьерской службы в Узбекистане, курьерская почта в Узбекистане, международная курьерская служба в Узбекистане, услуги курьерской компании в Узбекистане, услуги курьера в Ташкенте, курьерская доставка в Узбекистане'
        ]);
    } elseif ($lang == 'ru' and $id == 12) {
        $this->title = 'Складские услуги в Ташкенте и Узбекистане: услуги хранения товаров на складах от BTS';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Складские услуги в Ташкенте и Узбекистане. Необходимы услуги хранения грузов на складах в Узбекистане? BTS предлагает услуги хранение товаров в надежных складах на территории Узбекистана. Заказать складские услуги по приемлемым ценам можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Складские услуги в Ташкенте, Складские услуги в Узбекистане, услуги хранения на складах в Ташкенте, услуги хранения товаров на складах в Узбекистане, услуги хранения грузов на складах в Ташкенте, заказать складские услуги в Узбекистане, цена складских услуг в Узбекистане, стоимость складских услуг в Ташкенте'
        ]);
    } elseif ($lang == 'ru' and $id == 13) {
        $this->title = 'Услуги электронной коммерции (E-COMMERCE) в Ташкенте и Узбекистане: услуги в области электронной коммерции от bts';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Услуги электронной коммерции (E-COMMERCE) в Ташкенте и Узбекистане. Ищете качественные решения для электронной коммерции в Узбекистане? BTS предоставляет широкий спектр услуг в области электронной коммерции на территории Узбекистана. Заказать услуги электронной коммерции по доступным ценам можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Услуги электронной коммерции в Узбекистане, Услуги E-COMMERCE, электронная коммерция в Ташкенте, E-COMMERCE в Узбекистане, услуги в области электронной коммерции в Ташкенте, заказать услуги E-COMMERCE в Узбекистане, цена услуг электронной коммерции в Ташкенте'
        ]);
    } elseif ($lang == 'ru' and $id == 22) {
        $this->title = 'Служба международной доставки в Ташкенте и Узбекистане: международная перевозка грузов и почты от BTS';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Служба международной доставки в Ташкенте и Узбекистане. Необходимы услуги международной доставки грузов? BTS предлагает услуги международной грузовой и почтовой доставки с гарантией своевременного прибытия, по наиболее выгодным ценам! Заказать услуги международной доставки грузов в более чем 89 стран мира можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Служба международной доставки в Узбекистане, Служба международной доставки в Ташкенте, международная доставка в Узбекистане, международная перевозка грузов в Ташкенте, международная перевозка почты в Узбекистане, услуги международной грузовой доставки в Ташкенте, услуги международной почтовой доставки в Узбекистане, услуги международной доставки грузов в Ташкенте, услуги международной доставки в Узбекистане'
        ]);
    } elseif ($lang == 'ru' and $id == 23) {
        $this->title = 'Индивидуальная перевозка грузов в Ташкенте и Узбекистане: услуги индивидуальной доставки груза от BTS';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Индивидуальная перевозка грузов в Ташкенте и Узбекистане. Хотите заказать услугу индивидуальной доставки грузов в Узбекистане? BTS предлагает услуги индивидуальной грузовой доставки по Ташкенту и всему Узбекистану! Заказать услуги индивидуальной доставки грузов по лучшим ценам можно на сайте bts.uz!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Служба индивидуальной доставки в Узбекистане, Служба индивидуальной доставки в Ташкенте, Индивидуальная доставка в Узбекистане, Индивидуальная перевозка грузов в Ташкенте, Индивидуальная перевозка крупногабаритных грузов в Узбекистане, услуги индивидуальной грузовой доставки в Ташкенте, услуги индивидуальной доставки тяжеловесных грузов в Узбекистане, услуги индивидуальной доставки грузов в Ташкенте, услуги индивидуальной доставки в Узбекистане, услуги индивидуальной грузовой доставки в Узбекистане'
        ]);
    } elseif ($lang == 'uz' and $id == 1) {
        $this->title = 'Ekspress pochta Toshkent shahri va O\'zbekistonda: BTS Express tomonidan tezkor pochta yetkazib berish xizmatlari';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Ekspress pochta Toshkent shahri va O\'zbekistonda. O\'zbekistonda ekspress pochta xizmatlariga buyurtma berishni xohlaysizmi? BTS Express O\'zbekiston hududida ekspress pochta yetkazib berish xizmatlarini taklif etadi. “Eshikdan eshikkacha” ekspress pochta xizmatlarini bts.uz veb-saytdagi eng yaxshi narxlarda buyurtma qiling! '
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'BTS Express O\'zbekistonda, Ekspress pochta O\'zbekistonda, Ekspress pochta Toshkentda, pochta yetkazib berish O\'zbekistonda, ekspress pochta yetkazib berish xizmatlari O\zbekistonda, ekspress pochta yetkazib berish Toshkentda, Ekspress pochta yetkazib berish xizmatlari O\'zbekistonda, Ekspress pochta yetkazib berish xizmatlari Toshkentda, Ekspress pochta jo\'natish xizmatlari O\'zbekistonda, Ekspress pochta jo’natish xizmatlari Toshkentda, pochta yetkazib berish xizmatlari Toshkentda, pochtani ekspress usulda yetkazish O\'zbekistonda'
        ]);
    } elseif ($lang == 'uz' and $id == 2) {
        $this->title = 'Kompleks logistika Toshkent shahri va O\'zbekistonda: BTS dan qulay shartlarda logistika xizmatlari majmui';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Kompleks logistika Toshkent shahri va O\'zbekistonda. Sizga kompleks logistika xizmatlari kerakmi? BTS Toshkent shahri, O\'zbekiston va butun dunyo bo\'ylab logistika bo\'yicha keng ko\'lamli xizmatlarni taklif etadi! bts.uz saytida logistika xizmatlari majmuasiga maqbul narxlarda buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Kompleks logistika O\'zbekistonda, kompleks logistika Toshkentda, logistika xizmatlari majmuasi O\'zbekistonda, logistika xizmatlari majmuasi Toshkentda, kompleks logistika xizmatlari O\'zbekistonda, logistika xizmatlari Toshkentda, logistika bo’yicha xizmatlar O\'zbekistonda, logistika xizmatlari majmuasiga buyurtma berish O\'zbekistonda, logistika xizmatlari majmuasi narxi O\'zbekistonda'
        ]);
    } elseif ($lang == 'uz' and $id == 3) {
        $this->title = 'Kuryerlik xizmati Toshkent shahri va O\'zbekistonda: BTS dan yuk va pochta yetkazib berish bo\'yicha kuryerlik xizmatlari';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Kuryerlik xizmati Toshkent shahri va O\'zbekistonda. O\'zbekistonda ishonchli kuryer yetkazib berish xizmatini izlayapsizmi? BTS O\'zbekiston hududida yuk va pochta yetkazib berish bo\'yicha kuryerlik xizmatlarini taklif etadi. Bts.uz saytida aniq belgilangan joyga kuryer orqali yetkazib berish xizmatlariga arzon narxlarda buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Kuryerlik xizmati O\'zbekistonda, kuryerlik xizmati Toshkentda, kuryerlik xizmati O\'zbekiston bo\'ylab, yuk yetkazib berish bo\'yicha kuryerlik xizmatlari O\'zbekistonda, pochta yetkazib berish bo\'yicha kuryerlik xizmatlari O\'zbekistonda, kuryerlik yetkazib berish xizmatlari Toshkentda, kuryerlik xizmatlari O\'zbekistonda, kuryerlik pochtasi O\'zbekistonda, xalqaro kuryer xizmati O\'zbekistonda, kuryerlik kompaniyasi xizmatlari O\'zbekistonda, kuryerlik xizmatlari Toshkentda, kuryer yetkazib berish O\'zbekistonda'
        ]);
    } elseif ($lang == 'uz' and $id == 4) {
        $this->title = 'Xalqaro yetkazib berish xizmati Toshkent shahri  va O\'zbekistonda: BTS dan xalqaro yuk va pochta tashish';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Xalqaro yetkazib berish xizmati Toshkent shahri  va O\'zbekistonda. Xalqaro yuklarni yetkazib berish xizmatlari kerakmi? BTS o\'z vaqtida yetib kelish kafolati bilan eng qulay narxlarda xalqaro yuk va pochta yetkazib berish xizmatlarini taklif etadi! Siz dunyoning 89 dan ortiq mamlakatlariga xalqaro yuklarni yetkazib berish xizmatlariga bts.uz veb-saytida buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'xalqaro yetkazib berish xizmati O\'zbekistonda, xalqaro yetkazib berish xizmati Toshkentda, xalqaro yetkazib berish O\'zbekistonda, xalqaro yuk tashish Toshkentda, xalqaro pochta tashish O\'zbekistonda, xalqaro yuk yetkazib berish xizmatlari Toshkentda, xalqaro pochta yetkazib berish xizmatlari O\'zbekistonda, xalqaro yuk yetkazib berish xizmatlari Toshkentda, xalqaro yuk yetkazib berish xizmatlari O\'zbekistonda'
        ]);
    } elseif ($lang == 'uz' and $id == 5) {
        $this->title = 'Ombor xizmatlari Toshkent shahri va O\'zbekistonda: BTS tomonidan omborlarda tovarlarni saqlash xizmatlari';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Ombor xizmatlari Toshkent shahri va O\'zbekistonda. O\'zbekistonda omborlarda yuklarni saqlash xizmatlari kerakmi? BTS O\'zbekiston hududida ishonchli omborlarda tovarlarni saqlash xizmatlarini taklif etadi. Siz bts.uz saytida ombor xizmatlariga arzon narxlarda buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'ombor xizmatlari Toshkentda, ombor xizmatlari O\'zbekistonda, omborlarda saqlash xizmatlari Toshkentda, omborlarda tovarlarni saqlash xizmatlari O\'zbekistonda, omborlarda yuklarni saqlash xizmatlari Toshkentda, ombor xizmatlariga buyurtma berish O\'zbekistonda, ombor xizmatlari narxi O\'zbekistonda, ombor xizmatlari narxi Toshkentda '
        ]);
    } elseif ($lang == 'uz' and $id == 6) {
        $this->title = 'Elektron tijorat xizmatlari (E-COMMERCE) Toshkent shahri va O\'zbekistonda: BTS dan elektron tijorat xizmatlari ';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Elektron tijorat xizmatlari (E-COMMERCE) Toshkent shahri va O\'zbekistonda. O\'zbekistonda elektron tijorat uchun sifatli yechimlarni izlayapsizmi? BTS O\'zbekiston hududida elektron tijorat sohasida keng ko\'lamli xizmatlarni taqdim etadi. BTS.uz veb-saytida elektron tijorat xizmatlariga arzon narxlarda buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'elektron tijorat xizmatlari O\'zbekistonda, E-COMMERCE xizmatlari, elektron tijorat Toshkentda, E-COMMERCE O\'zbekistonda, elektron tijorat sohasidagi xizmatlar Toshkentda, E-COMMERCE xizmatlariga buyurtma berish O\'zbekistonda, elektron tijorat xizmatlari narxi Toshkentda'
        ]);
    } elseif ($lang == 'uz' and $id == 7) {
        $this->title = 'Yuklarni individual tashish Toshkent shahri va O\'zbekistonda: BTS dan yuklarni individual yetkazib berish xizmatlari';
        $this->registerMetaTag([
            'name' => 'description',
            'content' => 'Individual tashish Toshkent shahri va O\'zbekistonda. O\'zbekistonda yuklarni individual yetkazib berish xizmatiga buyurtma berishni xohlaysizmi? BTS Toshkent shahri va butun O\'zbekiston bo\'ylab individual yuk tashish xizmatlarini taklif etadi! bts.uz saytida eng yaxshi narxlarda individual tarzda yuklarni yetkazib berish xizmatlariga buyurtma berishingiz mumkin!'
        ]);
        $this->registerMetaTag([
            'name' => 'keywords',
            'content' => 'Individual yetkazib berish xizmati O\'zbekistonda, individual yetkazib berish xizmati Toshkentda, individual yetkazib berish O\'zbekistonda, individual yuk tashish Toshkentda, yirik hajmli yuklarni individual tashish O\'zbekistonda, individual yuk yetkazib berish xizmatlari Toshkentda, og\'ir vaznli yuklarni individual yetkazib berish xizmatlari O\'zbekistonda, individual yetkazib berish xizmatlari Toshkentda, individual yetkazib berish xizmatlari O\'zbekistonda, yuk tashish xizmatlari O\'zbekistonda'
        ]);
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
    .seo-container {
        height: 80px;
        overflow: hidden;
    }
    .site-index-text-min .show-all-text {
        margin-top: 15px;
        margin-bottom: 25px;
        font-size: 18px;
        padding: 5px 20px;
        background-color: #FFFFFF;
        color: #ee6800;
        cursor: pointer;
        border: 1px solid #ee6800;
        border-radius: 20px;
        display: inline-block;
        transition: all 3s;
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
                                        <a href="https://bts.uz/uz">BTS EXPRESS<a> - экспресс почта в Узбекистане, которая обеспечивает быструю и надёжную доставку грузов по стране, включая отдаленные районы Узбекистана. Экспресс доставка гарантирует высококачественное обслуживание, придерживаясь международных стандартов услуг перевозки. BTS экспресс почта предоставляет своевременные внутренние курьерские услуги в Узбекистане, в том числе доставку «от двери до двери». Для удобства наших клиент в наша сеть готова оказывать круглосуточные услуги в 68 рабочих пунктов страны, работая без выходных.
                                    </p>
                                </div>
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Ищете, где заказать недорогие услуги экспресс-почты в Узбекистане? Требуется срочная доставка документов в Ташкенте? Хотите отправить посылку экспресс-почтой в Россию или другую страну? Компания BTS Express поможет с решением подобных задач. Мы не первый год специализируемся на оказании различных логистических услуг, включая доставку экспресс-почты. За время своей деятельности нам удалось создать выгодные, комфортные и надежные условия обслуживания клиентов. Надежность, безопасность, оптимальные для Ташкента цены на услуги экспресс-почты — далеко не полный перечень преимуществ нашей компании. Ознакомьтесь с подробным описанием услуги и нашими достоинствами.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Экспресс-почта в Узбекистане: что мы предлагаем
                                        </h2>
                                        <p style="text-align: justify;">
                                            Представленная на этой странице услуга предполагает разные способы доставки грузов весом до 20 кг. Экспресс-почта включает, как курьерские услуги в пределах одного города, так и отправления в другие населенные пункты Узбекистана (более 70 рабочих пунктов), а также в зарубежные страны. Общим условием, помимо сравнительно небольшого веса отправлений, является оперативность выполнения заказов. В частности, доставка экспресс-почты по Ташкенту и в пределах любого другого города занимает не более 24 часов (исключение — национальные праздники).
                                        </p>
                                        <p style="text-align: justify;">
                                            Предлагаемый сервис от BTS Express обеспечивает быструю и надежную доставку грузов по стране, включая отдаленные районы Узбекистана, а также в зарубежные страны. Экспресс доставка гарантирует высококачественное обслуживание на уровне международных стандартов услуг перевозки. При этом мы обеспечиваем оптимальные для заказчиков цены на услуги экспресс-почты и минимальные сроки выполнения заказов.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Где в Узбекистане заказать доставку экспресс-почты: ваши возможности с BTS Express
                                        </h2>
                                        <p style="text-align: justify;">
                                            Многолетний опыт оказания различных логистических услуг позволил нам обеспечить оптимальные условия обслуживания клиентов. Помимо широкой географии и высококачественного обслуживания, о которых шла речь ранее, выбор нашей компании для доставки экспресс-почты в Узбекистане открывает перед клиентами следующие перспективы:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Оптимальные сроки выполнения заказов. При заказе услуги в пределах одного населенного пункта наши курьеры доставляют экспресс-почту в течение 24 часов. Сроки доставки в другие населенные пункты Узбекистана или за границу обсуждаются в индивидуальном порядке.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на услуги экспресс-почты. Наши сотрудники регулярно проводят мониторинг рынка, на основании чего мы устанавливаем расценки, удовлетворяющие желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Круглосуточная поддержка клиентов. Услуги нашего колл-центра доступны в режиме 24/7 (за исключением праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости доставки экспресс-почты и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания осуществляет за собственный счет смс-оповещение, отправку детализации, и ряд других полезных для клиента сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Также добавим, что нашим клиентам для пользования услугами доступны сразу две платформы. Вы можете заказывать услуги экспресс-почты и осуществлять контроль через вебсайт или мобильное приложение BTS Express. Оба варианта обеспечивают максимальное удобство и оперативность. Они открывают доступ к сервису пользователям смартфонов и планшетов, что позволяет оформлять заказы и контролировать их выполнение, находясь в любом месте и в любое время. Если вас интересуют услуги экспресс-почты в Узбекистане, BTS Express — оптимальный для этого выбор. Обращайтесь, и мы в полной мере оправдаем ваши ожидания!
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Компания BTS Express Cargo Servis предлагает услуги комплексной логистики в Узбекистане. Мы уже более 10 лет специализируемся на различных заказах, связанных с перевозкой и транспортировкой грузов. За время своей деятельности нам удалось создать выгодные, комфортные и надежные условия обслуживания. Ознакомьтесь с особенностями комплексных логистических услуг от BTS Express и нашими преимуществами.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Комплексная логистика: общие сведения
                                        </h2>
                                        <p style="text-align: justify;">
                                            Предлагаемая на этой странице нашего каталога услуга представляет собой системный подход к организации жизненного цикла товаров. То есть, мы предлагаем клиентам оказание различных логистических услуг с момента изготовления и до момента потребления. В зависимости от требований клиента и особенностей товара комплекс услуг по логистике от BTS Express может включать выполнение следующих работ:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                таможенное оформление;
                                            </li>
                                            <li style="list-style: disc;">
                                                сертификацию товара;
                                            </li>
                                            <li style="list-style: disc;">
                                                доставку документов за границу;
                                            </li>
                                            <li style="list-style: disc;">
                                                курьерские услуги по Узбекистану;
                                            </li>
                                            <li style="list-style: disc;">
                                                транспортно-складские услуги.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Этот список может продолжен. Фактически комплексная логистика — это индивидуально разработанный проект. В каждом отдельном случае сюда входят разные виды услуг, которые предварительно обсуждаются с клиентом и фиксируются в договоре. Соответственно, стоимость комплекса логистических услуг будет отличаться для каждого заказа. Ее мы сможем озвучить только после ознакомления с требованиями клиента и согласования с ним условий сотрудничества.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Услуги комплексной логистики в Узбекистане: почему выбирают нас
                                        </h2>
                                        <p style="text-align: justify;">
                                            Большой опыт оказания различных транспортных услуг позволил нам обеспечить оптимальные условия обслуживания клиентов. Выбор BTS Express для заказа комплексной логистики в Ташкенте или других городах Узбекистана открывает перед клиентами следующие перспективы:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Гарантированное качество и надежность. Компания принимает на себя ответственность за целостность и сохранность доставляемых грузов. По согласованию с заказчиком мы оформляем страховку.
                                            </li>
                                            <li style="list-style: disc;">
                                                Оптимальные сроки выполнения заказов. В рамках услуг комплексной логистики мы строго соблюдаем обещанные заказчикам сроки. Это касается всех выполняемых нашими сотрудниками работ.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на комплексные логистические услуги. Наши сотрудники регулярно проводят мониторинг рынка, на основании чего мы устанавливаем расценки, удовлетворяющие желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Качественная круглосуточная поддержка клиентов. Услуги нашего колл-центра доступны в режиме 24/7 (за исключением праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости услуг комплексной логистики и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания берет на себя расходы на отправку детализации, смс-оповещение, а также ряд других полезных для клиента сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Отдельно добавим, что нашим клиентам для пользования услугами доступны сразу две платформы — вебсайт и мобильное приложение. Оба варианта обеспечивают максимальное удобство и оперативность. Они позволяют управлять сервисом и контролировать оказание услуг комплексной логистики в удобном месте и в удобное время.
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Компания BTS Express предлагает услуги курьерской доставки в Ташкенте и других городах Узбекистана. Мы не первый год специализируемся на этом направлении. Клиентам предлагаются выгодные, комфортные и надежные условия обслуживания. Оперативность, надежность, вежливые и аккуратные курьеры — только некоторые преимущества услуги. Ознакомьтесь с подробным описанием сервиса курьерской доставки и достоинствами нашего предложения.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Курьерская служба экспресс в Узбекистане: что предлагают в BTS Express
                                        </h2>
                                        <p style="text-align: justify;">
                                            Представленная на этой странице услуга предполагает отправку посылок и почты в формате "от двери до двери" в пределах одного населенного пункта. Как это работает? Вы оформляете заказ на нашем сайте или в мобильном приложении BTS. Наш курьер связывается с вами для уточнения деталей заказа. После согласования он прибывает на указанный адрес в назначенное время, получает груз и доставляет его по месту назначения. Все это осуществляется в течение максимум 24 часов (исключение составляют праздничные дни).
                                        </p>
                                        <p style="text-align: justify;">
                                            Наша миссия — обеспечить быструю и надежную доставку любых ваших отправлений или грузов с момента получения в указанное вами место по наиболее приемлемым ценам. Для этого сотрудники отдела логистики прокладывают оптимальные маршруты, позволяющие избежать пробок и доставить посылку или почту в кратчайшие сроки. При получении груза курьер вместе с заказчиком проверяет целостность упаковки. При необходимости он сам помогает упаковать и опломбировать посылку или конверт с почтой. Проверка осуществляется и при передаче груза получателю, что гарантирует сохранность и целостность доставленного груза.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Преимущества курьерской доставки от BTS
                                        </h2>
                                        <p style="text-align: justify;">
                                            Многолетний опыт оказания услуг в сфере доставки и перевозки позволил нам обеспечить оптимальные условия обслуживания. Выбор нашей компании для заказа курьерской доставки в Узбекистане открывает перед клиентами следующие возможности:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Гарантированное качество и надежность. Наша компания принимает на себя ответственность за целостность и сохранность содержимого ваших посылок. Упаковка производится только один раз. При этом все отправления максимально защищены от утери или хищения.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на услуги курьерской доставки. Мы регулярно проводим мониторинг рынка и устанавливаем расценки, которые в полной мере удовлетворяют желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Оптимальные сроки выполнения заказов. Курьерская доставка в Ташкенте и других населенных пунктах Узбекистана осуществляются в течение 24 часов за исключением национальных праздников. При необходимости наши курьеры доставляют посылки и почту в указанное клиентом время.
                                            </li>
                                            <li style="list-style: disc;">
                                                Круглосуточная поддержка. Услуги нашего колл-центра доступны в режиме 24/7 (кроме праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости курьерской доставки и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания осуществляет за свой счет смс-оповещение, отправку детализации, возможность отслеживать перемещение курьера с вашим грузом и ряд других сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Отдельно добавим, что нашим клиентам доступны две платформы для пользования услугами. Вы можете заказывать курьерскую доставку и контролировать процесс через вебсайт или мобильное приложение BTS. Оба варианта обеспечивают максимальное удобство и оперативность. Они открывают доступ к услугам с мобильных устройств. Это значит, что вызвать курьера для доставки можно, находясь в любом месте и в любое время. Отправляйте посылки и почту через курьерскую службу BTS Express — мы приложим все усилия, чтобы в полной мере удовлетворить ваши ожидания!
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Компания BTS Express Cargo Servis предлагает складские услуги в Узбекистане. Мы не первый год специализируемся на оказании различных логистических услуг, включая хранение грузов. За время своей деятельности нам удалось создать выгодные, комфортные и надежные условия для оказания услуг складской логистики. Надежность, безопасность, оптимальные для Ташкента цены на транспортно складские услуги — далеко не все плюсы нашей компании. Ознакомьтесь с подробным описанием услуг складской логистики от BTS Express и нашими преимуществами.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Транспортно-складские услуги в Узбекистане: что предлагают в BTS Express
                                        </h2>
                                        <p style="text-align: justify;">
                                            Сервис, предложенный на этой странице нашего каталога, предполагает аренду складских помещений для хранения различных грузов. Особенность нашего предложения заключается в том, что вы можете заказывать складские услуги, как отдельно, так и в комплексе с внутренними или международными перевозками. Классический пример — хранение крупной партии грузов на складе BTS Express во время оформления таможенной документации перед транспортировкой. Мы являемся универсальным партнером, и готовы взять на себя решение всех задач. Другими словами, обратившись к нам, вы сможете заказать и перевозку за границу, и таможенное оформление, и складские услуги. 
                                        </p>
                                        <p style="text-align: justify;">
                                            Вторая особенность хранения грузов на складах нашей компании — масштабность. Мы располагаем помещением, площадь которого составляет почти 4000 м2. При этом оборудование склада соответствует международным стандартам. Это значит, что хранить здесь можно практически любые виды грузов за небольшими исключениями (уточняйте информацию у наших консультантов).
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Преимущества складских услуг от BTS Express
                                        </h2>
                                        <p style="text-align: justify;">
                                            Большой опыт оказания услуг по хранению грузов на складе позволил нам обеспечить оптимальные условия обслуживания. Помимо комплексного обслуживания и больших площадей, о которых шла речь ранее, выбор нашей компании открывает перед клиентами следующие возможности:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Гарантированное качество и надежность хранения. Компания принимает на себя ответственность за целостность и сохранность ваших грузов. Складские помещения BTS Express надежно защищены от хищения и неблагоприятных климатических условий.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на транспортно-складские услуги. Мы регулярно проводим мониторинг рынка и устанавливаем расценки, которые в полной мере удовлетворяют желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Круглосуточная поддержка. Услуги нашего колл-центра доступны в режиме 24/7 (кроме праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости услуг по хранению грузов на складе BTS Express и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания осуществляет за свой счет смс-оповещение, отправку детализации, и ряд других сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Отдельно добавим, что нашим клиентам доступны сразу две платформы для пользования услугами. Вы можете заказывать складские услуги и осуществлять контроль через вебсайт или мобильное приложение BTS. Оба варианта обеспечивают максимальное удобство и оперативность. Они открывают доступ к сервису пользователям мобильных устройств. Это значит, что оформить заказ и контролировать его выполнение можно, находясь в любом месте и в любое время. Если вас интересуют услуги хранения товара на складе в Ташкенте или других городах Узбекистана, BTS Express — оптимальный для этого выбор. Обращайтесь, и мы обязательно оправдаем ваши ожидания!
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Ищете, где в Узбекистане заказать услуги электронной коммерции? Сталкиваетесь с материальными трудностями при возврате товара клиентами вашего интернет-магазина? Желаете оптимизировать процедуру доставки заказов покупателям в Ташкенте или других городах? Компания BTS Express — оптимальный выбор для решения подобных задач. Мы не первый год специализируемся на оказании различных логистических услуг, включая E-Commerce. Несмотря на то, что этот сервис является сравнительно новым, нам уже удалось создать выгодные, комфортные и надежные условия обслуживания клиентов. Ознакомьтесь с подробным описанием услуги и нашими преимуществами.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Услуги электронной коммерции в Узбекистане: что предлагают клиентам BTS Express
                                        </h2>
                                        <p style="text-align: justify;">
                                            Предложенная на этой странице услуга будет интересна представителям торгового бизнеса и в, первую очередь, владельцам интернет-магазинов. Услуга E-Commerce представляет собой комплексный сервис, позволяющий с максимальной для заказчика выгодой решать вопросы доставки и возврата товара. Услуги электронной коммерции охватывают все технологические потребности бизнеса. При разработке этого сервиса были учтены такие важные для клиентов моменты, как оперативность и снижение затрат. Кроме того, BTS Express предлагает решения для электронной коммерции, доставку в тот же день, по расписанию и по запросу. Еще одна важная особенность услуги заключается в обеспечении гарантий оплаты клиентом товара при условиях расчета после получения.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Услуги электронной коммерции в Узбекистане: почему выбирают нас
                                        </h2>
                                        <p style="text-align: justify;">
                                            Большой опыт оказания различных транспортных услуг позволил нам обеспечить оптимальные условия обслуживания клиентов. Выбор сервиса E-Commerce от BTS Express открывает перед клиентами следующие перспективы:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Гарантированное качество и надежность. Компания принимает на себя ответственность за целостность и сохранность доставляемых товаров. Упаковка производится только один раз, а при получении заказа, наш представитель обязательно выполняет проверку в присутствии покупателя.
                                            </li>
                                            <li style="list-style: disc;">
                                                Оптимальные сроки выполнения заказов. В рамках услуг электронной коммерции мы строго соблюдаем обещанные заказчикам сроки. Товар доставляется практически "минута в минуту". Исключением могут быть только форс-мажорные обстоятельства или личная просьба покупателя.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на услуги электронной коммерции. Наши сотрудники регулярно проводят мониторинг рынка, на основании чего мы устанавливаем расценки, удовлетворяющие желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Круглосуточная поддержка клиентов. Услуги нашего колл-центра доступны в режиме 24/7 (за исключением праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости услуг E-Commerce и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания осуществляет за собственный счет смс-оповещение, отправку детализации, и ряд других полезных для клиента сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Также добавим, что нашим клиентам для пользования услугами доступны сразу две платформы — вебсайт и мобильное приложение. Оба варианта обеспечивают максимальное удобство и оперативность.
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
                                <div class="site-index-text-min">
                                    <div class="seo-container">
                                        <p style="text-align: justify;">
                                            Компания BTS Express предлагает услуги международной доставки в Узбекистане. Мы уже несколько лет активно развиваем это направление, расширяя географию и повышая качество обслуживания. Клиентам предлагаются выгодные, комфортные и надежные условия доставки грузов в зарубежные страны. Оперативность, надежность, отправления в более 89-и стран, приемлемые цены на услуги международной доставки — только некоторые плюсы этой услуги. Ознакомьтесь с подробным описанием сервиса курьерской доставки и преимуществами услуг от BTS Express.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Международная доставка от BTS Express: что мы предлагаем
                                        </h2>
                                        <p style="text-align: justify;">
                                            Предложенная на этой странице услуга подразумевает транспортировку различных грузов из Узбекистана в другие страны и в обратном направлении. Наша компания предоставляет международные курьерские услуги с гарантией своевременной доставки и по выгодным ценам. Количество стран, в / из которых вы можете доставить грузы, постоянно увеличивается. При этом мы задействуем все доступные виды транспорта, что позволяет оптимизировать затраты заказчиков. Для самых популярных направлений (Россия - Узбекистан, Турция - Узбекистан и других) компания предлагает максимально выгодные условия в плане оплаты и сроков.
                                        </p>
                                        <p style="text-align: justify;">
                                            Сокращение расходов также обеспечивается за счет ряда дополнительных услуг, которые берет на себя наша компания. При необходимости мы выполняем оформление таможенных и транспортных документов, сертификацию, а также ряд других процедур, необходимых для международных перевозок. Такой сервис позволяет нашим клиентам экономить не только деньги, но и время, которые играет очень важную роль в современном бизнесе.
                                        </p>
                                        <h2 style="font-weight: 750; font-size: 18px; color: #1b3b8d; margin-bottom: 24px;">
                                            Где в Узбекистане заказать международные перевозки: наши преимущества
                                        </h2>
                                        <p style="text-align: justify;">
                                            Большой опыт оказания услуг международной доставки позволил нам обеспечить оптимальные условия обслуживания. Помимо масштабной географии и предоставления дополнительных услуг, о которых шла речь ранее, выбор нашей компании открывает перед клиентами следующие возможности:
                                        </p>
                                        <ul style="text-align: justify; padding-left: 35px;">
                                            <li style="list-style: disc;">
                                                Гарантированное качество и надежность. Наша компания принимает на себя ответственность за целостность и сохранность ваших отправлений. Мы страхуем все грузы, отправленные в другие страны или получаемые из-за рубежа.
                                            </li>
                                            <li style="list-style: disc;">
                                                Оптимальные сроки выполнения заказов. Международные перевозки осуществляются в предварительно оговоренные сроки, которые фиксируются в договорах. Эффективная работа отдела логистики сопутствует оперативному выполнению заказов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Минимальные для Узбекистана цены на услуги международной доставки. Мы регулярно проводим мониторинг рынка и устанавливаем расценки, которые в полной мере удовлетворяют желания и возможности клиентов.
                                            </li>
                                            <li style="list-style: disc;">
                                                Круглосуточная поддержка. Услуги нашего колл-центра доступны в режиме 24/7 (кроме праздничных дней). Консультанты помогут оформить заказ, проинформируют о стоимости международной доставки и ответят на другие вопросы, связанные с этим сервисом.
                                            </li>
                                            <li style="list-style: disc;">
                                                Комплекс бесплатных услуг. Компания осуществляет за свой счет смс-оповещение, отправку детализации, возможность отслеживать перемещение вашего груза и ряд других сервисов.
                                            </li>
                                        </ul>
                                        <p style="text-align: justify;">
                                            Отдельно добавим, что нашим клиентам доступны две платформы для пользования услугами. Вы можете заказывать международную доставку и контролировать процесс через вебсайт или мобильное приложение BTS. Оба варианта обеспечивают максимальное удобство и оперативность. Они открывают доступ к услугам с мобильных устройств. Это значит, что оформить заказ и контролировать его выполнение можно, находясь в любом месте и в любое время. Если вас интересуют услуги международной доставки в Узбекистане, BTS Express — оптимальный для этого выбор. Обращайтесь, и мы обязательно оправдаем ваши ожидания!
                                        </p>
                                    </div>
                                    <div class="show-all-text">
                                        <?= Yii::t('app', 'more') ?>
                                        <span class="icon _iconright-arrow" style="display: inline-block; vertical-align: middle;"></span>
                                    </div>
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
        $('.show-all-text').click(function(e){
            var cssValue =$(this).closest('.site-index-text-min').find('.seo-container').css('height');
            if (cssValue == '80px') {
                $(this).closest('.site-index-text-min').find('.seo-container').css('height', 'auto');
            } else {
                $(this).closest('.site-index-text-min').find('.seo-container').css('height', '80px');
            }
        })
    ");
?>