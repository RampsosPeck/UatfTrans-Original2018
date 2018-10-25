<style>
    .widget-user-header{

        background-image: url(/img/SEOuatfINFRA.jpg);
        background-position: center center;
        background-size: cover;
        height: 300px !important;
        padding-top: 100px;
        padding-bottom: 100px;
        
       
    }
    .widget-user .card-footer{
        padding: 10;
    }

    .widget-user-image {
        position: absolute;
        top: 270px !important;
        left: 50%;
        margin-left: -45px; 
    }
    .widget-user .widget-user-image > img {

        width: 130px;
        height: auto;
        border: 3px solid #ffffff;

    }
</style>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header text-white"  >
                    <h3 class="widget-user-username">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc">Web Designer</h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle" src="/img/SEOuatfINFRA.jpg" >
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">3,200</h5>
                          <span class="description-text">SALES</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <h5 class="description-header">13,000</h5>
                          <span class="description-text">FOLLOWERS</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">35</h5>
                          <span class="description-text">PRODUCTS</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.widget-user -->
          
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
