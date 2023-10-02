<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href=<?= base_url() . 'public/user/assets/imges/favicon.png' ?>>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() . 'public/user/assets/css/calculate-salary.css' ?>">
    <link rel="stylesheet" href="<?= base_url() . 'public/user/assets/css/front.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">


    <title>calculate-salary</title>

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
                        <form action="" id="requestToConnect">
                            <div class="row">
                                <div class="col-xxl-9 col-lg-9 col-md-8">
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Please enter your email">
                                </div>
                                <div class="col-xxl-3 col-lg-3 col-md-4">
                                    <button type="button" id="sentMail" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>

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
                                        <p><i class="fa-solid fa-envelope"></i> <a href="mailto:example@example.com">123@example.com</a></p>
                                        <p><i class="fa-solid fa-phone"></i> <span>+1 (123) 456-7890</span></p>
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