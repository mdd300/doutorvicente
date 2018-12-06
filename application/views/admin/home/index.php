<!DOCTYPE html>
<html>
    <?= $this->load->view('admin/inc/header'); ?>
    <body>
        <!-- Container -->
        <div id="container">

            <!-- Header -->
            <div id="header">
                <!-- Top -->
                <?= $this->load->view('admin/inc/top') ?>
                <!-- End of Top-->

                <!-- The navigation bar -->
                <?= $this->load->view('admin/inc/menu') ?>
                <!-- End of navigation bar" -->

            </div>
            <!-- End of Header -->

            <!-- Background wrapper -->
            <div id="bgwrap">

                <!-- Main Content -->
                <div id="content">
                    <div id="main">
                        <h1>Bem-vindo,</h1>
                        <p>ao sistema de administração do site.</p>
                        <?= $this->load->view('admin/inc/messages') ?>
                        <div class="pad20">
                            <!-- Big buttons -->
                            <ul class="dash">
                                <li>
                                    <a href="admin/outras_clinicas" title="Gerencie o conteúdo do site." class="tooltip">
                                        <img src="assets/images/admin/icons/19_48x48.png" alt="" />
                                        <span>Outras Clínicas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/noticias" title="Gerencie as notícias do site." class="tooltip">
                                        <img src="assets/images/admin/icons/1_48x48.png" alt="" />
                                        <span>Notícias</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/banners" title="Gerencie os banners do site." class="tooltip">
                                        <img src="assets/images/admin/icons/16_48x48.png" alt="" />
                                        <span>Banners</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/newsletters" title="Gerencie a lista de newsletter do site." class="tooltip">
                                        <img src="assets/images/admin/icons/27_48x48.png" alt="" />
                                        <span>Newsletter</span>
                                    </a>
                                </li>
                            </ul>
                            <!-- End of Big buttons -->
                        </div>
                        <hr />
                    </div>
                </div>
                <!-- End of Main Content -->

            </div>
            <!-- End of bgwrap -->
        </div>
        <!-- End of Container -->

        <!-- Footer -->
        <?= $this->load->view('admin/inc/footer') ?>
        <!-- End of Footer -->
    </body>
</html>


