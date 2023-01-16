<?php
session_start();
include "shared/database.php";
?>
<style>
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: transparent;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<div class="ms_header">
                <div class="ms_top_left">
                    <div class="ms_top_search">
                        <input type="text" class="form-control" placeholder="Search Music Here..">
                        <span class="search_icon">
                            <img src="images/svg/search.svg" alt="">
                        </span>
                    </div>
                    <div class="ms_top_trend">
                        <span><a href="#" class="ms_color">Trending Songs :</a></span> <span class="top_marquee"><a href="#">Dream your moments, Until I Met You, Gimme Some Courage, Dark Alley (+8 More)</a></span>
                    </div>
                </div>
                <div class="ms_top_right">
                                      <div class="ms_top_btn">
                        <?php
                        if(isset($_SESSION['user_id'])){
                        ?>
                        <div class="dropdown"><a href="#" style="text-transform:uppercase;" class="ms_btn"><?php echo $_SESSION['username']?></a>
											
											<!--Dropdown Menu Start-->
											
		                                            <div class="dropdown-content"><a href="logout.php" class="ms_btn">Log out</a></div>
													
		                                            
		                                            
		                                        
		                                        <!--Dropdown Menu End-->
                        </div>
                                            <?php
                        }else{
                                            ?>
                        <a href="./Login_v1/register.php" class="ms_btn reg_btn" ><span>register</span></a>
                        <a href="./Login_v1/login.php" class="ms_btn" ><span>login</span></a>
                        <?php }?>
                    </div>
                </div>
            </div>