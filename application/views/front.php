<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() . 'public/user/assets/css/calculate-salary.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">


    <title>calculate-salary</title>
    <style>
        label .error {
            color: red !important;
        }

        .calculate-banner {
            padding: 0 !important;
        }

        .flag {
            display: flex;
            justify-content: end;
            gap: 5px;
            position: relative;
            z-index: 222;
        }

        .flag span {
            padding: 0 !important;
            cursor: pointer;
        }

        .flag img {
            max-width: 30px;
        }

        .VIpgJd-ZVi9od-ORHb-OEVmcd {
            position: relative !important;
            display: none !important;
        }

        body {
            top: 0 !important;
        }

        .modal-dialog {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 0px !important;
            margin-bottom: 0px !important;
        }

        .modal-dialog .modal-content {
            width: 800px;
            min-width: 800px;
            max-width: 800px;
            border-radius: 50px;
            border: 1px solid #E9B6FF;
            background: #FFF;
            padding: 30px;
        }

        .modal-content .close {
            border-radius: 50%;
            background: #E9B6FF;
            box-shadow: 0px 10px 30px 0px rgba(233, 182, 255, 0.15);
            width: 100%;
            max-width: 30px;
            height: 30px;
            border: none !important;
            color: #5F0087 !important;
        }

        .modal-header {
            border-bottom: none !important;
            padding: 0px !important;
        }

        .modal-body {
            padding: 0px !important;
        }

        .modal-main-wrp {
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .modal-main-wrp:last-child {
            padding-bottom: 0px !important;
        }

        .modal-main-wrp input {
            border-radius: 90px;
            border: 1px solid #DADAD2;
            background: #FFF;
            height: 45px;
            padding-left: 20px;
            color: #685D6D !important;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .modal-main-wrp input:focus {
            box-shadow: none !important;
            border: 1px solid #E9B6FF !important;
        }

        .modal-main-wrp select {
            border-radius: 90px;
            border: 1px solid #DADAD2;
            height: 45px;
            padding-left: 20px;
            color: #685D6D !important;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .modal-main-wrp select:focus {
            box-shadow: none !important;
            border: 1px solid #E9B6FF !important;
        }

        .modal-main-wrp input::placeholder {
            color: #685D6D !important;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .modal-main-wrp textarea {
            border-radius: 20px;
            border: 1px solid #DADAD2;
            background: #FFF;
            height: 100px;
            padding-left: 20px;
            padding-top: 10px;
            color: #685D6D !important;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .modal-main-wrp textarea::placeholder {
            color: #685D6D !important;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 20px;
        }

        .modal-main-wrp textarea:focus {
            box-shadow: none !important;
            border: 1px solid #E9B6FF !important;
        }

        .modal-main-wrp button {
            border-radius: 90px;
            background: #E9B6FF !important;
            box-shadow: 0px 10px 30px 0px rgba(233, 182, 255, 0.15);
            color: #5F0087 !important;
            font-family: "Gordita";
            font-size: 16px;
            font-weight: 700;
            line-height: 80%;
            border: 1px solid transparent !important;
            padding: 15px 30px;
            margin-top: 20px;
            text-transform: capitalize;
        }

        .modal-main-wrp button:focus {
            box-shadow: none !important;
        }

        .modal-main-wrp-1 button {
            display: block;
            margin-left: auto;
            margin-top: 0px !important;
            padding: 15px 40px;
        }

        .modal-main-wrp-1 {
            border-bottom: 2px solid #E9B6FF;

        }

        .modal-main-wrp-2 button {}

        .modal-main-wrp .error {
            color: #685D6D;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 400;
            line-height: 24px;
            margin-bottom: 0px;
        }

        .modal-main-wrp-2 form .form-wrp {
            margin-bottom: 20px;
        }

        .modal-main-wrp .iti--separate-dial-code .iti__selected-flag {
            border-radius: 90px 0px 0px 90px;
            background-color: #E9B6FF !important;
        }

        .modal-main-wrp .iti--separate-dial-code .iti__selected-dial-code {
            color: #5F0087;
            font-family: "Gordita";
            font-size: 14px;
            font-weight: 600;
            line-height: 24px;
        }

        .modal-main-wrp .iti {
            width: 100%;
        }

        .modal-footer-btn {
            width: 100%;
            text-align: center;
        }

        .modal-footer-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .static-content {
            display: flex;
            align-items: center;
            gap: 30px;
            padding-top: 30px;
            padding-bottom: 30px;
            border-top: 2px solid #E9B6FF;
        }

        /* .modal-main-wrp-2 form .form-wrp:last-child{
             margin-bottom: 30px !important;
        } */
        .textarea-wrp {
            margin-bottom: 30px !important;
        }

        .static-content p {
            color: #685D6D;
            font-family: "Gordita";
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            margin-bottom: 0px;
        }

        .static-content p i {
            margin-right: 5px;
        }

        .static-content p:last-child {
            border-bottom: none;
        }

        .static-content p span,
        .static-content p a {
            color: #5F0087;
            font-family: "Gordita";
            font-size: 16px;
            font-weight: 500;
            line-height: 24px;
            text-decoration: none !important;
        }

        .hire-now-btn button {
            padding: 15px 25px;
            background: var(--white) !important;
            border: transparent;
            color: var(--primary) !important;
            font-family: var(--Gordita-bold);
            box-shadow: 0px 10px 30px rgba(194, 127, 27, 0.1);
            font-size: 15px;
            font-weight: 700;
            line-height: 13px;
            border-radius: 90px;
            text-decoration: none;
        }

        .hire-now-btn button:focus {
            box-shadow: none !important;
        }

        @media only screen and (max-width: 1199px) {
            .modal-dialog .modal-content {
                width: 600px;
                min-width: 600px;
                max-width: 600px;
                border-radius: 30px;
            }
        }

        @media only screen and (max-width: 991px) {
            .modal-dialog .modal-content {
                width: 600px;
                min-width: 600px;
                max-width: 600px;
                border-radius: 30px;
                max-height: 500px;
                overflow-y: scroll;
            }
        }

        @media only screen and (max-width: 767px) {
            .modal-dialog .modal-content {
                width: 100%;
                min-width: 100%;
                max-width: 100%;
                border-radius: 30px;
            }

            .modal-main-wrp-1 button {
                margin-top: 20px !important;
            }
        }

        @media only screen and (max-width: 575px) {
            .modal-dialog {
                width: auto;
            }
        }

        @media only screen and (max-width: 424px) {
            .modal-footer-btn {
                flex-direction: column;
                gap: 10px;
            }

            .modal-main-wrp-2 button {
                margin-top: 0px !important;
            }
        }
    </style>

</head>

<body>
    <section class="calculate-banner hero-section position-relative overflow-hidden industry-im p-100">
        <img src="<?= base_url() ?>public/user/assets/imges/earth-circle.svg" class="earth-circle-img position-absolute" alt="">
        <div class="container">

            <div class="flag">
                <div id="google_translate_element" style="display:none"></div>

                <span id="engbtn" data="en"><img src="<?= base_url() . 'public/user/assets/img/eng.png' ?>"></span>
                <span id="frbtn" data="fr"><img src="<?= base_url() . 'public/user/assets/img/france.png' ?>"></span>

            </div>

            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center">
                    <div class="hero-content">
                        <h1>Simulateur de coûts par CreativeSquad</h1>
                        <p>Calcule le coût de votre projet</p>
                        <a href="https://creativesquad.fr/" class="lg-btn wow fadeInRight" type="button" data-wow-delay="0.8s">Retour à l'accueil</a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="position-relative banner-images z-index-3">
                        <img src="<?= base_url() ?>public/user/assets/imges/calculate-banner-img.png" alt="" class="banner-im" />
                        <div class="banner-related-images-wrap" id="banner-related-images">
                            <img src="<?= base_url() ?>public/user/assets/imges/calculate-banner-img-1.png" class="position-absolute rel-imgs banner-dev-img1" alt="img3" />
                            <img src="<?= base_url() ?>public/user/assets/imges/calculate-banner-img-2.png" class="position-absolute rel-imgs banner-dev-img2" alt="img4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="calculate-salary-section p-100">
        <img src="<?= base_url() ?>public/user/assets/imges/top-left-circle-img.png" alt="" class="top-left-circle-img">
        <img src="<?= base_url() ?>public/user/assets/imges/bottom-right-circle-img.png" alt="" class="bottom-right-circle-img">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                    <div class="main-proffesion proffesion-wrapper">
                        <h2>
                            <span><img src="<?= base_url() ?>public/user/assets/imges/profftion-img.svg" alt=""></span>
                            Profession
                        </h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper">
                            <?php foreach ($getProfession as $key => $value) {
                                $id = $this->utility->safe_b64encode($value->id);
                            ?>
                                <div class="techno-check profession" data-profession_id="<?= $id ?>">
                                    <input class="techno_checkbox" type="radio" value="one_value" name="radioname1" id="radio-one" />
                                    <div class="proffesion-sub-category">
                                        <h4><?= $value->name ?></h4>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="stack-wrapper proffesion-wrapper d-none">
                        <h2>
                            <span><img src="<?= base_url() ?>public/user/assets/imges/stack-img.svg" alt=""></span>
                            Stack
                        </h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="Stack">
                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="two_value" name="radioname2" id="radio-two" />
                                <div class="proffesion-sub-category">
                                    <h4>Frontend</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>Backend</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>Fullstack</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>Fullstack</h4>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="technology-wrapper proffesion-wrapper d-none">
                        <h2>
                            <span><img src="<?= base_url() ?>public/user/assets/imges/technology-img.svg" alt=""></span>
                            Technologie
                        </h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="techno">
                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="three_value" name="radioname3" id="radio-three" />
                                <div class="proffesion-sub-category">
                                    <h4>Angular</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>React</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>VueJS</h4>
                                </div>
                            </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname" />
                                <div class="proffesion-sub-category">
                                    <h4>VueJS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="our-expertise-wrapper proffesion-wrapper d-none">
                        <h2>
                            <span><img src="<?= base_url() ?>public/user/assets/imges/your-expertise-img.svg" alt=""></span>
                            Niveau d'expertise
                        </h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="experience">
                            <?php foreach ($getLevel as $key => $value) { ?>
                                <div class="techno-check experience" data-experience_id="<?= $this->utility->safe_b64encode($value->id) ?>">
                                    <input class="techno_checkbox" type="radio" value="four_value" name="radioname4" id="radio-four" />
                                    <div class="proffesion-sub-category">
                                        <h4><?= $value->name ?></h4>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">

                    <div class="button_tabs">
                        <button class="switch_btn month active" buttonId="monthly">Mensuel</button>
                        <button class="switch_btn year " buttonId="yearly">Annuel</button>
                    </div>

                    <div class="total-salary-wrapper" id='salary_wage'>
                        <div class="monthly-salary-wapper monthly-salary-info common-salary-wrapper">
                            <img src="<?= base_url() ?>public/user/assets/imges/monthly-top-right.svg" alt="monthly-top-right" class="monthly-top-right">
                            <img src="<?= base_url() ?>public/user/assets/imges/montly-bottom-left.svg" alt="montly-bottom-left" class="montly-bottom-left">
                            <h4>Coût mensuel</h4>
                            <h3 class='fill_info'><span><i class="fa-solid fa-euro-sign"></i></span> Remplir les
                                informations</h3>
                            <div class="cost-wrap d-none">
                                <div class="cost-box">
                                    <div class="d-flex justify-content-center" id="creativesquad-pr">
                                    </div>
                                    <h2 class=''>Prix de Creative Squad</h2>
                                    <div class="mt-4 cost-pr">
                                        <h5 id="frc_cost"></h5>
                                        <p>*Salaire net + Charges sociales + Impôts + Frais d'embauche</p>
                                    </div>
                                </div>

                                <!-- <div class="cost-box">
                                    <h2 class=''>France Companies Cost</h2>
                                    <h3 id="frcmin-monthly"></h3>
                                    <h3 id="frcmax-monthly"></h3>
                                </div>
                                <div class="cost-box">
                                    <h2 class=''>France Base Cost</h2>
                                    <h3 id="frcminBase-monthly"></h3>
                                    <h3 id="frcmaxBase-monthly"></h3>
                                </div>
 -->
                            </div>
                            <div class="hire-now-btn">
                                <button type="button" class="btn btn-primary hire" data-toggle="modal" data-target="#exampleModal">
                                    Embauchez maintenant !
                                </button>



                                <!-- <a href="https://creativesquad.fr/contact-us/">Embauchez maintenant !</a> -->
                            </div>
                            <div class="mt-5 mon-list">
                                <span>(1) Pas de frais de recrutement,</span>
                                <span>(2) Pas de longue période d'attente,</span>
                                <span>(3) Modèles de travail flexibles</span>
                            </div>
                            <div class="cost-pr">
                                <p>Le simulateur de prix ne peut être considéré comme une offre contractuelle.</p>
                            </div>
                        </div>
                        <div class="yearly-salary-wapper monthly-salary-info common-salary-wrapper d-none">
                            <img src="<?= base_url() ?>public/user/assets/imges/monthly-top-right.svg" alt="monthly-top-right" class="monthly-top-right">
                            <img src="<?= base_url() ?>public/user/assets/imges/montly-bottom-left.svg" alt="montly-bottom-left" class="montly-bottom-left">
                            <h4>Coût annuel</h4>
                            <h3 class='fill_info'><span><i class="fa-solid fa-euro-sign"></i></span> Remplir les
                                informations</h3>
                            <div class="cost-wrap d-none">
                                <div class="cost-box">



                                    <div class="d-flex justify-content-center" id="creativesquad-pr-year">

                                    </div>
                                    <h2 class=''>Creative Squad Price</h2>
                                    <div class="mt-4 cost-pr">
                                        <h5 id="frc_cost_yr"></h5>
                                        <p>*Salaire net + Charges sociales + Impôts + Frais d'embauche</p>
                                    </div>
                                </div>
                                <!-- <div class="cost-box">
                                    <h2>France Companies Cost</h2>
                                    <h3 id="frcmin-yearly" ></h3>
                                    <h3 id="frcmax-yearly" ></h3>
                                </div>
                                <div class="cost-box">
                                    <h2>France Base Cost</h2>
                                    <h3 id="frcminBase-yearly" ></h3>
                                    <h3 id="frcmaxBase-yearly" ></h3>
                                </div> -->
                            </div>
                            <div class="hire-now-btn">

                                <button type="button" class="btn btn-primary hire" data-toggle="modal" data-target="#exampleModal">
                                    Embauchez maintenant !
                                </button>

                                <!-- <a href="https://creativesquad.fr/contact-us/">Embauchez maintenant !</a> -->
                            </div>
                            <div class="mt-5 mon-list">
                                <span>(1) Pas de frais de recrutement,</span>
                                <span>(2) Pas de longue période d'attente,</span>
                                <span>(3) Modèles de travail flexibles</span>
                            </div>
                            <div class="cost-pr">
                                <p>Le simulateur de prix ne peut être considéré comme une offre contractuelle.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-bottom clculate-footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-logo">
                        <img src="<?= base_url() ?>public/user/assets/img/footer-logo.svg" alt="">
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <h4>Le marché de l'embauche à distance</h4>
                    <p>Mettre en relation les entreprises avec les meilleurs talents mondiaux afin d’aider les
                        ingénieurs et les recruteurs à constituer plus rapidement des équipes techniques.</p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <h4>Réseaux sociaux</h4>
                    <div class="footer-social-icons">
                        <ul class="d-flex justify-content-space-between ps-0">
                            <li><a href="https://www.facebook.com/CreativeSquadfr/" target="_blank"><img src="<?= base_url() ?>public/user/assets/img/Facebook.png" alt=""></a></li>
                            <li><a href="https://twitter.com/CreativeSquadfr/" target="_blank"><img src="<?= base_url() ?>public/user/assets/img/Twitter.png" alt=""></a></li>
                            <li><a href="https://www.linkedin.com/company/creative-squadfr/" target="_blank"><img src="<?= base_url() ?>public/user/assets/img/Linkedin.png" alt=""></a></li>
                            <li><a href="https://www.instagram.com/creativesquadfr/" target="_blank"><img src="<?= base_url() ?>public/user/assets/img/instagram.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class=" calculate-footer-copyright footer-copyright d-flex justify-content-between align-items-center">
                        <p class="mb-0">Copyright © <?= date('Y') ?> Creative Squad Inc. Tous droits réservés.</p>
                        <div><a href="">Privacy policy | Terms &amp; conditions</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="base_url" value="<?= base_url() ?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="<?= base_url() ?>public/admin/assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php
    if (!empty($js)) {
        foreach ($js as $value) {
    ?>
            <script src="<?php echo base_url(); ?>public/user/assets/javascript/<?php echo $value ?>" type="text/javascript">
            </script>
    <?php
        }
    }
    ?>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: "fr"
            }, 'google_translate_element');
        }


        $(document).on("click", "#engbtn", function() {

            var language = $("#engbtn").attr("data");
            var selectField = document.querySelector("#google_translate_element select");
            for (var i = 0; i < selectField.children.length; i++) {
                var option = selectField.children[i];
                // find desired langauge and change the former language of the hidden selection-field 
                if (option.value == language) {
                    selectField.selectedIndex = i;
                    // trigger change event afterwards to make google-lib translate this side
                    selectField.dispatchEvent(new Event('change'));
                    break;
                }
            }
        });


        $(document).on("click", "#frbtn", function() {

            var language = $("#frbtn").attr("data");
            var selectField = document.querySelector("#google_translate_element select");
            for (var i = 0; i < selectField.children.length; i++) {
                var option = selectField.children[i];
                // find desired langauge and change the former language of the hidden selection-field 
                if (option.value == language) {
                    selectField.selectedIndex = i;
                    // trigger change event afterwards to make google-lib translate this side
                    selectField.dispatchEvent(new Event('change'));
                    break;
                }
            }
        });
    </script>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-main-wrp modal-main-wrp-1">
                        <div class="row">
                            <form action="" id="requestToConnect">

                                <div class="col-xxl-10 col-lg-9 col-md-9">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Please enter your email">

                                </div>
                                <div class="col-xxl-2 col-lg-3 col-md-3">
                                    <button type="button" id="sentMail" class="btn btn-primary">Send</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="modal-main-wrp modal-main-wrp-2">
                        <form action="" id="contactForm">
                            <div class="row">
                                <div class="col-xxl-6 col-lg-6 form-wrp">
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Name">
                                </div>
                                <div class="col-xxl-6 col-lg-6 form-wrp">
                                    <input class="form-control" id="email" type="email" name="contact_email" placeholder="Email">
                                </div>
                                <div class="col-xxl-6 col-lg-6 form-wrp">
                                    <input type="text" id="mobile_code" class="form-control" placeholder="Phone Number" name="phone_number">
                                </div>
                                <div class="col-xxl-6 col-lg-6 form-wrp">
                                    <select class="form-control form-select" id="country" name="country">
                                        <option value="">Select a Country</option>
                                        <?php

                                        foreach (countryList() as  $key => $value) {
                                        ?>
                                            <option value="<?= $value ?>"><?= $value ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-xxl-12 col-lg-12 form-wrp textarea-wrp">
                                    <textarea class="form-control" id="message" name="message" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <div class="col-xxl-12 col-lg-12">
                                    <div class="static-content">
                                        <p><i class="fa-solid fa-envelope"></i> Email: <br> <a href="mailto:example@example.com">123@example.com</a></p>
                                        <p><i class="fa-solid fa-phone"></i> Telephone: <br> <span>+1 (123) 456-7890</span></p>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer-btn">
                                <!-- <button type='submit' id="sentContactMail" class="btn btn-primary">Submit</button> -->
                                <button type='button' id="sentContactMail" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>