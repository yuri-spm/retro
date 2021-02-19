
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Bistrô | Restaurante Retrô</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid p-0">
                    <div class="header_bottom_border">
                        <div class="row align-items-center no-gutters">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.php">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="index.php">Início</a></li>
                                            <li><a href="menu.php">Cardápio</a></li>
                                            <li><a href="about.php">Sobre Nós </a></li>
                                            <li><a href="contact.php">Peça já!</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="say_hello">
                                    <a href="cadastro.php">Cadastre-se!</a> <!--aqui colocar cadastre-se-->
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Faça seu pedido</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                    <div id="map" style="height: 480px; position: relative; overflow: hidden;"> </div>
                    <script>
                        function initMap() {
                            var uluru = {
                                lat: -25.363,
                                lng: 131.044
                            };
                            var grayStyles = [{
                                    featureType: "all",
                                    stylers: [{
                                            saturation: -90
                                        },
                                        {
                                            lightness: 50
                                        }
                                    ]
                                },
                                {
                                    elementType: 'labels.text.fill',
                                    stylers: [{
                                        color: '#ccdee9'
                                    }]
                                }
                            ];
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: {
                                    lat: -31.197,
                                    lng: 150.744
                                },
                                zoom: 9,
                                styles: grayStyles,
                                scrollwheel: false
                            });
                        }
                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&amp;callback=initMap">
                    </script>
    
                </div>
    
    <!-- ================ SEÇÃO DO PEDIDO ================= -->
                <div class="row">
                    <div class="col-12">
                        
<!-- ================ SESSION PHP ================= -->

        
<h2 class="contact-title">Peça aqui!</h2>

                      

<!-- ================ FIM DA SESSION PHP ================= -->




<!-- ================ INCÍCIO DO FORMULÁRIO DO PEDIDO ================= -->

                    </div>
                    <div class="col-lg-8">

                        <!-- ================ INCÍCIO DO FORMULÁRIO DO PEDIDO ================= -->

                        <form action="../Source/CRUD/Cadastro_pedido.php" method="POST"> 
                            
                        <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nome" id="name" type="text"  placeholder="Informe seu nome">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" placeholder="E-mail">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        
                                    
                                    <br><br>
                                    <select class="wide" name="produto1_id">
                                            <option data-display="Almoço">Almoço</option>
                                            <option value="1">Picanha avec farofa | R$ 60,00</option>
                                            <option value="2">Jarret rôti avec tutú aux haricots | R$ 55,00</option>
                                            <option value="3">Poulet strogonoff | R$ 20,00</option>
                                            <option value="4">Rouget en tranches avec bouillie de poisson | R$ 40,00</option>
                                            <option value="5">Poulet rôti | R$ 18,00</option>
                                            <option value="6">Riz et haricots | R$ 7,00</option>
                                        </select><br>
                                        <label for="quantidade">Quantidade (escolha 1 até 5 porções):</label>
                                        <input type="number" id="quantidade1" name="quantidade1" min="1" max="5" >
                                    
                                    
										<br><br>
                                        <select class="wide" name="produto2_id">
                                            <option data-display="Café da Manhã">Café da Manhã</option>
                                            <option value="7">Pain chaud | R$ 5,00</option>
                                            <option value="8">Toast Petrópolis au parmesan | R$ 6,50</option>
                                            <option value="9">Pain avec saucisse | R$ 10,00</option>
                                            <option value="10">Pain aux oeufs | R$ 6,50</option>
                                            <option value="11">Pain au fromage | R$ 7,00</option>
                                            <option value="12">Gâteau à la semoule de maïs à la noix de coco | R$ 5,00</option>
                                        </select><br>
                                        <label for="quantidade">Quantidade (escolha 1 até 5 porções):</label>
                                        <input type="number" id="quantidade2" name="quantidade2" min="1" max="5" >
                                    

										<br><br>											
                                        <select class="wide" name="produto3_id">
                                            <option data-display="Jantar">Jantar</option>
                                            <option value="13">Poulet à la farine de manioc | R$ 20,00</option>
                                            <option value="14">Presunto de parma caneloni e mussarela búfala | R$ 68,00 + R$ 1,00</option>
                                            <option value="15">Lasagnes normales du dimanche - C'est pour applaudir debout! | R$ 25,00</option>
                                            <option value="16">Crêpe fou - Crêpe avec de la glace et un morceau de kiwi | R$ 13,00</option>
                                            <option value="17">Burger Cury | R$ 18,00</option>
                                            <option value="18">Gros Pourri | R$ 15,00</option>

                                        </select><br>
                                        <label for="quantidade">Quantidade (escolha 1 até 5 porções):</label>
                                        <input type="number" id="quantidade3" name="quantidade3" min="1" max="5" >
                                    <br><br>
                                   
                                   </div>


                                    
                                </div>
                              <div class="col-6">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="mensagem" id="mensagem" cols="30" rows="6"  placeholder=" Algum comentário? Ex: Sem cebola... "></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Enviar pedido!</button>
                            </div>
                        </form> 
                        <!-- ================ FIM DO FORMULÁRIO DO PEDIDO ================= -->

                    </div>

                </div>
            </div>
        </section>
    <!-- ================ FIM DA SEÇÃO DO PEDIDO ================= -->
    
    <!-- footer_start  -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="img/footer_logo.png" alt="">
                                </a>
                            </div>
                            <p>Av. Vinte de Janeiro, s/nº<br> Ilha do Governador, Rio de Janeiro - RJ<br>
                                <a href="#">+21 3686 2567</a> <br>
                                <a href="#">contato@bistro.com.br</a>
                            </p>
                            <p>



                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4 offset-xl-1">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Links Úteis
                            </h3>
                            <ul>
                                <li><a href="Menu.php">Cardápio</a></li>
                                <li><a href="about.php">Sobre Nós</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                receba nossa Newsletter
                            </h3>
                            <form action="#" class="newsletter_form">
                                <input type="text" placeholder="Informe seu e-mail">
                                <button type="submit">inscrever-se</button>
                            </form>
                            <p class="newsletter_text">Cozinhar é o momento em que todos os ingredientes se encontram e juntos formam uma ópera de aromas e sabores.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/gijgo.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>



    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>


    <script src="js/main.js"></script>

    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-calendar-o"></span>'
            }

        });
    </script>
</body>

</html>