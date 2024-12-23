 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-center mb-4 page-title">
                    	<h1 class="text-white">Chào mừng tới <?php echo $_SESSION['setting_name']; ?></h1>
                        <hr class="divider my-4 bg-dark" />
                        <a class="btn btn-dark bg-black btn-xl js-scroll-trigger" href="#menu">Đặt hàng ngay</a>

                    </div>
                    
                </div>
            </div>
        </header>
	<section class="page-section" id="menu">
        <h1 class="text-center text-cursive" style="font-size:3em"><b>Menu</b></h1>
        <div class="d-flex justify-content-center">
            <hr class="border-dark" width="5%">
        </div>
        <div class="container">

            <div id="menu-field" class="card-deck mt-2 row">
                    <?php 
                        include 'admin/db_connect.php';
                        $limit = 6;
                        $page = (isset($_GET['_page']) && $_GET['_page'] > 0) ? $_GET['_page'] - 1 : 0 ;
                        $offset = $page > 0 ? $page * $limit : 0;
                        $all_menu =$conn->query("SELECT id FROM  product_list")->num_rows;
                        
                        $page_btn_count = ceil($all_menu / $limit);
                        $qry = $conn->query("SELECT * FROM  product_list order by `name` asc Limit $limit OFFSET $offset ");
                        while($row = $qry->fetch_assoc()):
                        ?>
                        
                        <div class="col-lg-4 mb-3">
                            <div class="card menu-item rounded-5 overflow-hidden ">
                                <div class="position-relative overflow-hidden" id="item-img-holder">
                                    <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body  d-flex flex-column justify-content-between">
                                    <div>

                                        <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                        <p class="card-text truncate"><?php echo $row['description'] ?></p>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-outline-dark view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
            </div>
        </div>
        <?php //$page_btn_count = 10;exit; ?>
        <!-- Pagination Buttons Block -->
        <div class="w-100 mx-4 d-flex justify-content-center">
            <div class="btn-group paginate-btns">
                <!-- Previous Page Button -->
                <a class="btn btn-default border border-dark" <?php echo ($page == 0)? 'disabled' :'' ?> href="./?_page=<?php echo ($page) ?>">Prev.</a>
                <!-- End of Previous Page Button -->
                <!-- Pages Page Button -->
        
                <!-- looping page buttons  -->
                <?php for($i = 1; $i <= $page_btn_count; $i++): ?>
                <!-- Display button blocks  -->
        
                <!-- Limiting Page Buttons  -->
                <?php if($page_btn_count > 10): ?>
                <!-- Show ellipisis button before the last Page Button  -->
                    <?php if($i = $page_btn_count && !in_array($i, range( ($page - 3), ($page + 3) ) )): ?>
                        <a class="btn btn-default border border-dark ellipsis">...</a>
                    <?php endif; ?>
            
                    <!-- Show ellipisis button after the First Page Button  -->
                    <?php if($i == 1 || $i == $page_btn_count || (in_array($i, range( ($page - 3), ($page + 3) ) )) ): ?>
                        <a class="btn btn-default border border-dark <?php echo ($i == ($page + 1)) ? 'active' : '';  ?>" href = "./?_page=<?php echo $i ?>"><?php echo $i; ?></a>
                        <?php if($i == 1 && !in_array($i, range( ($page - 3), ($page + 3) ) )): ?>
                            <a class="btn btn-default border border-dark ellipsis">...</a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <a class="btn btn-default border border-dark <?php echo ($i == ($page + 1)) ? 'active' : '';  ?>" href = "./?_page=<?php echo $i ?>"><?php echo $i; ?></a>
                <?php endif; ?>
                <!-- Display button blocks  -->
                <?php endfor; ?>
                <!-- End of looping page buttons  -->
        
                <!-- End of Pages Page Button -->
                <!-- Next Page Button -->
                <a class="btn btn-default border border-dark" <?php echo (($page+1) == $page_btn_count)? 'disabled' :'' ?> href="./?_page=<?php echo ($page+2) ?>">Next</a>
                <!-- End of Next Page Button -->
            </div>
        </div>
        <!-- End Pagination Buttons Block -->
    </section>
    <section class="p-5 ">
        <div class="container ">
            <div class="d-flex w-100 flex-column align-items-center mb-5">
                <div class="card-title h1 text-black font-weight-bolder" >Cách đặt hàng</div>
                <div class="" style="height: 5px; width: 40px; background-color: red;"></div>
            </div>
            <div class="row custom-animation fade-up">
                <div class="col-sm-6 col-lg-3 mb-4 d-flex">
                    <div class="px-4 py-4 card shadow">
                        <i class="display-5 bi bi-card-checklist "></i>
                        <p class="card-title ">Chọn Gói Ăn</p>
                        <p class="lh-lg" style="font-size: 14px; font-family: monospace;">Chọn gói ăn phù hợp với nhu cầu của bạn và điền đầy đủ thông tin giao hàng</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3  mb-4 d-flex">
                    <div class="px-4 py-4 card shadow">
                        <i class="display-5 bi bi-cookie "></i>
                        <p class="card-title ">Lạc Bửu nấu</p>
                        <p class="lh-lg" style="font-size: 14px; font-family: monospace">Chúng tôi lựa chọn những nguyên liệu tốt nhất và nấu trong bếp công nghiệp hiện đại</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3  mb-4 d-flex">
                    <div class="px-4 py-4 card shadow">
                        <i class="display-5 bi bi-truck "></i>
                        <p class="card-title ">Giao hàng</p>
                        <p class="lh-lg" style="font-size: 14px; font-family: monospace">Đội ngũ giao hàng của Lạc Bửu sẽ giao tận nơi các phần ăn cho bạn mỗi ngày</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3  mb-4 d-flex">
                    <div class="px-4 py-4 card shadow">
                        <i class="display-5 bi bi-cup-hot "></i>
                        <p class="card-title ">Thưởng thức</p>
                        <p class="lh-lg" style="font-size: 14px; font-family: monospace">Không cần suy nghĩ, shopping hay nấu nướng dầu mỡ, chỉ cần hâm và thưởng thức!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="p-5" >
        <div class="container">
            <div class="d-flex  flex-column align-items-center mb-5" style="font-family: Faculty Glyphic;" >
                <p class="h1 ">CHUNG TAY BẢO VỆ</p>
                <p class="h1 font-weight-bold text-black">MÔI TRƯỜNG</p>
                <div class="" style="height: 10px; width: 60px; background-color: red;"></div>
            </div>
            <div class="row d-flex align-items-stretch custom-animation fade-up">
                <div class=""></div>
                <div class="col-md-10 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/dsc04248-15668117116574.JPG" alt="">
                        
                        <p class="lh-lg mt-lg-3 mt-md-2 w-100" style="font-size: 14px; font-family: monospace;">Nhà cung cấp duy nhất sử dung túi Nylon sinh học tự hủy thân thiện với môi trường</p>
                    </div>
                </div>
                <div class="col-md-10 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/dsc04268-15668122623444.JPG" alt="">
                        
                        <p class="lh-lg mt-lg-3 mt-md-2 w-100" style="font-size: 14px; font-family: monospace">Rửa sạch lại hộp nhựa đen để nhận hoàn tiền 5,000 vnd cho mỗi 10 hộp</p>
                    </div>
                </div>
                <div class="col-md-10 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/dsc04263-15668117777881.JPG" alt="">
                        <p class="lh-lg mt-lg-3 mt-md-2 w-100" style="font-size: 14px; font-family: monospace">Lạc Bửu chỉ cung cấp 01 bộ muỗng nĩa mỗi ngày để giảm thiểu rác thải nhựa</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="p-5 text-white" style="background-color: #048E9A;">
        <div class="container">
            <div class="d-flex  flex-column align-items-center mb-5">
                <p class="h1 ">HOẠT ĐỘNG THIỆN NGUYỆN</p>
                <div class="" style="height: 10px; width: 60px; background-color: red;"></div>
            </div>
            <div class="row d-flex align-items-stretch text-white custom-animation fade-up">
                <div class="col-md-12 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/yuu09832-edit-1-170918191934.jpg" alt="">
                        
                        <p class="lh-lg mt-3 text-white" style="font-size: 14px; font-family: monospace;">Mang Tết về Lớp học tình thương Long Bửu</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/fitfood-san-se-yeu-thuong-2-16921661397455.jpg" alt="">
                        
                        <p class="lh-lg mt-3 text-white" style="font-size: 14px; font-family: monospace">Gửi 150 phần ăn đến các "ngoại" và sư cô tại Chùa Lâm Quang, Quận 8</p>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 mb-4 d-flex" >
                    <div class="px-4 py-4 d-flex flex-column ">
                        <img src="https://fitfood.vn/img/346x288/uploads/fitfood-san-se-yeu-thuong-3-16926979919731.jpg" alt="">
                        <p class="lh-lg mt-3 text-white" style="font-size: 14px; font-family: monospace">Lan toả tình yêu thương đến bà con tại Bệnh Viện Nhiệt Đới, Quận 5</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="p-5" style="background-color: #E5E5E5;">
        <div class="container text-center " >
            <h2 class="font-weight-bold text-black">ĐỐI TÁC</h2>
            <p class="pb-2">Chúng tôi hợp tác với các nhà cung cấp hàng đầu để đảm bảo chất lượng trải nghiệm tốt nhất</p>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/aha-169528796639.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/lacaph-16952879752401.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/fitpack-16952879844178.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-star-kombucha-16014620887392.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/megamarket-15625154298117.png" alt=""></div>
                <div class="col-1"></div>
                <div class="col-1"></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/payoo-15625154518087.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/nakayama-15625155077656.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/jafpa-15694083848488.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/vineco-15685206922536.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-15686011892226.png" alt=""></div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>
    <section class="p-5" style="background-color: #E5E5E5;">
        <div class="container text-center " >
            <h2 class="font-weight-bold text-black">Khách hàng</h2>
            <p class="pb-2">Lạc Bửu tự hào là lựa chọn ưu tiên hàng đầu của các doanh nghiệp lớn trong và ngoài nước
                        <br>(Click vào logo để xem hình ảnh thực tế sự kiện)
                        <br>Liên hệ business@lacbuu.vn để đặt tiệc ngay</p>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-loreal-viet-nam-den-transparent-1-17185159878491.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-astra-17157549891201.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/tagline-lock-up-1-orangevng-master-17091812782907.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-17091801011997.webp" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logocitigym-1709180160773.png" alt=""></div>
                <div class="col-1"></div>
                <div class="col-1"></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-tiki-png-16039561972419.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/coop-15694086865358.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/nestlelogo-with-wordmark-black-244x250mm-cmyk-17165185082292.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/wellspring-logo-1-17266455991804.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/salonpassvg-16720344297781.png" alt=""></div>
                <div class="col-1"></div>
                <div class="col-1"></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-itr-17266447713315.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/saigon-heat-15685204405616.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/14511723-gigamalllogo-01-15685392974799.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/logo-shinhan-bank-17266454712133.png" alt=""></div>
                <div class="col-2"><img src="https://fitfood.vn/img/160x0/images/techcomrun-small-15753651582381.png" alt=""></div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>
    <script>
        
        $('.view_prod').click(function(){
            uni_modal_right('Chi tiết sản phẩm','view_prod.php?id='+$(this).attr('data-id'))
            
        })
    </script>
    <?php if(isset($_GET['_page'])): ?>
        <script>
            $(function(){
                document.querySelector('html').scrollTop = $('#menu').offset().top - 100
            })
        </script>
    <?php endif; ?>
	
