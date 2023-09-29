<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url().'public/user/assets/css/calculate-salary.css'?>">
    <title>calculate-salary</title>
</head>

<body>
    <section class="calculate-banner hero-section position-relative overflow-hidden industry-im p-100">
        <img src="<?=base_url()?>public/user/assets/imges/earth-circle.svg" class="earth-circle-img position-absolute" alt="">
       <div class="container">
           <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6 d-flex align-items-center">
                    <div class="hero-content">
                        <h1>Calculate his salary</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <a href="https://creativesquad.fr/web/"  class="lg-btn wow fadeInRight" type="button" data-wow-delay="0.8s">Back to home</a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="position-relative banner-images z-index-3">
                        <img src="<?=base_url()?>public/user/assets/imges/calculate-banner-img.png" alt="" class="banner-im" />
                        <div class="banner-related-images-wrap" id="banner-related-images">
                            <img src="<?=base_url()?>public/user/assets/imges/calculate-banner-img-1.png" class="position-absolute rel-imgs banner-dev-img1" alt="img3" />
                            <img src="<?=base_url()?>public/user/assets/imges/calculate-banner-img-2.png" class="position-absolute rel-imgs banner-dev-img2" alt="img4" />
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </section>
    <section class="calculate-salary-section p-100">
        <img src="<?=base_url()?>public/user/assets/imges/top-left-circle-img.png" alt="" class="top-left-circle-img">
        <img src="<?=base_url()?>public/user/assets/imges/bottom-right-circle-img.png" alt="" class="bottom-right-circle-img">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12">
                    <div class="main-proffesion proffesion-wrapper">
                        <h2>
                        <span><img src="<?=base_url()?>public/user/assets/imges/profftion-img.svg" alt=""></span>    
                        Your Proffesion
                        </h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper">
                        <?php foreach($getProfession as $key => $value){ 
                            $id = $this->utility->safe_b64encode($value->id);
                        ?>
                            <div class="techno-check profession" data-profession_id="<?=$id?>" >
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname1" id="radio-one" />
                                <div class="proffesion-sub-category">
                                        <h4><?=$value->name?></h4>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>

                    <div class="stack-wrapper proffesion-wrapper d-none">
                        <h2>
                        <span><img src="<?=base_url()?>public/user/assets/imges/stack-img.svg" alt=""></span>     
                        Stack</h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="Stack">
                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="two_value" name="radioname2" id="radio-two"/>
                            <div class="proffesion-sub-category">
                                    <h4>Frontend</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>Backend</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>Fullstack</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>Fullstack</h4>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="technology-wrapper proffesion-wrapper d-none" >
                        <h2>
                        <span><img src="<?=base_url()?>public/user/assets/imges/technology-img.svg" alt=""></span>     
                        Technology</h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="techno">
                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="three_value" name="radioname3" id="radio-three"/>
                            <div class="proffesion-sub-category">
                                    <h4>Angular</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>React</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>VueJS</h4>
                            </div>
                        </div>

                            <div class="techno-check">
                                <input class="techno_checkbox" type="radio" value="one_value" name="radioname"/>
                            <div class="proffesion-sub-category">
                                    <h4>VueJS</h4>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="our-expertise-wrapper proffesion-wrapper d-none">
                        <h2>
                        <span><img src="<?=base_url()?>public/user/assets/imges/your-expertise-img.svg" alt=""></span>     
                        Your level of expertise</h2>
                        <!-- -----sub-category--- -->
                        <div class="sub-category-wrapper" id="experience" >
                        <?php foreach($getLevel as $key => $value){ ?>
                            <div class="techno-check experience" data-experience_id ="<?=$this->utility->safe_b64encode($value->id)?>">
                                <input class="techno_checkbox" type="radio" value="four_value" name="radioname4" id="radio-four"/>
                                 <div class="proffesion-sub-category">
                                    <h4><?=$value->name?></h4>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12">

                <div class="button_tabs">
                <button class="switch_btn month active">Monthly</button>
                <button class="switch_btn year ">Yearly</button>
                </div>

                    <div class="total-salary-wrapper"  id='salary_wage'>
                        <div class="monthly-salary-wapper monthly-salary-info common-salary-wrapper" >
                            <img src="<?=base_url()?>public/user/assets/imges/monthly-top-right.svg" alt="monthly-top-right" class="monthly-top-right">
                            <img src="<?=base_url()?>public/user/assets/imges/montly-bottom-left.svg" alt="montly-bottom-left" class="montly-bottom-left">
                            <h4>Monthly salary range</h4>
                            <h3 class='fill_info'><span><i class="fa-solid fa-euro-sign"></i></span> Fill in the info</h3>
                            <div class="cost-wrap d-none">
                                <div class="cost-box">
                                    <div class="d-flex justify-content-center" id="creativesquad-pr">
                                    </div>
                                    <h2 class=''>Creative Squad Price</h2>
                                    <div class="mt-4 cost-pr">
                                        <h5 id="frc_cost"></h5>
                                        <p>*Net Salary + Social charges + Taxes + Hiring cost</p>
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
 -->                            </div>
                            <div class="hire-now-btn">
                                <a href="#">Hire now!</a>
                            </div>
                             <div class="cost-pr">
                                <p>Price Simulator can't be considered as contractual offers.</p>
                            </div> 
                        </div>
                        <div class="yearly-salary-wapper monthly-salary-info common-salary-wrapper d-none">
                            <img src="<?=base_url()?>public/user/assets/imges/monthly-top-right.svg" alt="monthly-top-right" class="monthly-top-right">
                            <img src="<?=base_url()?>public/user/assets/imges/montly-bottom-left.svg" alt="montly-bottom-left" class="montly-bottom-left">
                            <h4>Yearly salary range</h4>
                            <h3 class='fill_info'><span><i class="fa-solid fa-euro-sign"></i></span> Fill in the info</h3>
                            <div class="cost-wrap d-none">
                                <div class="cost-box">

                                  


                                    <div class="d-flex justify-content-center" id="creativesquad-pr-year">
                                      
                                    </div>
                                    <h2 class=''>Creative Squad Price</h2>
                                    <div class="mt-4 cost-pr" >
                                        <h5 id="frc_cost_yr"></h5>
                                        <p>*Net Salary + Social charges + Taxes + Hiring cost</p>
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
                                <a href="#">Hire now!</a>
                            </div>
                             <div class="cost-pr">
                                <p>Price Simulator can't be considered as contractual offers.</p>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="clculate-footer-top footer-top wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-xxl-7 col-xl-7 col-lg-7 d-flex align-items-center">
                    <div class="footer-top-content">
                        <h3>Ready to Connect with Top Freelance Developers &amp; Designers?</h3>
                        <a href="hire-open-source.php" target="_blank" class="lg-btn black-btn wow fadeInRight" type="button" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInRight;">Hire a Top Freelance Talent Now</a>
                    </div>
                </div>
                <div class="col-xxl-5 col-xl-5 col-lg-5">
                    <div class="footer-top-img text-md-center text-center w-100">
                        <img src="<?=base_url()?>public/user/assets/img/footer-top-img.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="footer-bottom clculate-footer-bottom">
        <div class="container"> 
            <div class="row">
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <div class="footer-logo">
                        <img src="<?=base_url()?>public/user/assets/img/footer-logo.png" alt="">
                    </div>
                </div> 
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <h4>The remote-hiring marketplace</h4>
                    <p>Connecting companies with the best of global talent to help engineers and recruiters build tech teams faster.</p>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-6">
                    <h4>Social Connects</h4>
                    <div class="footer-social-icons">
                        <ul class="d-flex justify-content-space-between ps-0">
                           <li><a href=""><img src="<?=base_url()?>public/user/assets/img/Facebook.png" alt=""></a></li>
                           <li><a href=""><img src="<?=base_url()?>public/user/assets/img/Twitter.png" alt=""></a></li>
                           <li><a href=""><img src="<?=base_url()?>public/user/assets/img/Linkedin.png" alt=""></a></li>
                           <li><a href=""><img src="<?=base_url()?>public/user/assets/img/instagram.png" alt=""></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class=" calculate-footer-copyright footer-copyright d-flex justify-content-between align-items-center">
                        <p class="mb-0">Copyright © 2023 silwanafrance Inc. All rights reserved.</p>
                        <div><a href="">Privacy policy | Terms &amp; conditions</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <input type="hidden" id="base_url" value="<?=base_url()?>">
     <script src="<?=base_url()?>public/admin/assets/js/app.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
<?php
if (!empty($js)) {
    foreach ($js as $value) {
        ?>
        <script src="<?php echo base_url(); ?>public/user/assets/javascript/<?php echo $value ?>"
        type="text/javascript"></script>
        <?php
    }
}
?>    
</body>
</html>