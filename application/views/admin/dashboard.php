    <style>
        .main-wrapper a{
          text-decoration: none !important;
        }
        .mydiv-wrapper{
          padding: 20px 20px;
          background: #fff !important;
          box-shadow: 0 0 20px rgb(0 0 0 / 1%);
          border-radius: 10px;
        }
        .mydiv-wrapper h3{
          font-size: 24px;
          color: #343a40 !important;
          margin-bottom: 0px;
        }
        .mydiv-wrapper p{
          color: #6c757d !important;
          font-weight: 500;
          font-size: 15px;
          margin-bottom: 0px;
        }

        @media only screen and (max-width: 992px){
          .mydiv-wrapper{
            margin-bottom: 20px !important;
          }
        }
    </style>


    <div class="row">
      <div class="col-12 col-sm-12 col-lg-12">
        <div class="row main-wrapper">

            <div class="col-lg-3 col-md-6 col-12">
             <a href="<?=base_url().'admin/profession'?>">
              <div class="mydiv-wrapper">
                  <div class="icon">
                    <h3>Total Profession</h3>
                  </div>
                  <div class="text">
                      <p><?=$totalProfession?></p> 
                  </div>
              </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
              <a href="<?=base_url().'admin/stack'?>">
              <div class="mydiv-wrapper">
                  <div class="icon">
                    <h3>Total Stack</h3>
                  </div>
                  <div class="text">
                      <p><?=$totalStack?></p> 
                  </div>
              </div>
              </a>
            </div>

           <div class="col-lg-3 col-md-6 col-12">
            <a href="<?=base_url().'admin/tech'?>">
              <div class="mydiv-wrapper">
                  <div class="icon">
                    <h3>Total Technology</h3>
                  </div>
                  <div class="text">
                      <p><?=$totalTech?></p> 
                  </div>
              </div>
              </a>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
              <a href="<?=base_url().'admin/experience'?>">
              <div class="mydiv-wrapper">
                  <div class="icon">
                    <h3>Total Experience</h3>
                  </div>
                  <div class="text">
                      <p><?=$totalPayable?></p> 
                  </div>
              </div>
              </a>
            </div>


            

        </div>
      </div>

    </div>
