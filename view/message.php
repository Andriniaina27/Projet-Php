<?php
require 'header.php';
?>
<div class=".body-chat">
<div class="container-fluid">
    <div class="row">
        <?php
        require 'navbar.php';
        ?>
        <main role="main" class="col-md-10 ml-sm-auto px-4 ">
            <div class="container-fluid p-top">
                    <div class="chat-container">
                        <div class="sidebar-chat">
                            <h5>Messages <i class="fas fa-bars"></i></h5>
                            <div class="chat-list">
                            </div>
                        </div>

                        <!-- Chat Section -->
                        <div class="chat-section">
                            <div class="chat-header bg-primary">
                            <form action="../models/message.php" class="col-md-12 col-sm-12 d-flex" method="post">
                                    <div class="input-group mb-3">
                                        <select class="form-select" name="destinataire_id" id="inputGroupSelect01">
                                            <?php
                                                require '../models/selectSMS.php';
                                            ?>
                                            <?php foreach ($clients as $c): ?>
                                                <option value="<?= $c['id'] ?>"><?= $c['nom'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- <i class="fas fa-ellipsis-v"></i> -->
                                </div>
                                <div class="chat-messages bg-light">
                                    <div class="message me" style="flex-direction: column;"> 
                                    <?php foreach ($messages as $m): ?>
                                        à <?= $m['nom_client'] ?> | <?= $m['date_envoi'] ?>
                                        <div class="message-content text-light mb-3">
                                            <?= $m['contenu'] ?>
                                        </div>
                                    <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="chat-footer bg-primary">
                                    <div class="col-md-12 col-sm-12 d-flex">
                                        <textarea placeholder="Message..." name="contenu" class="form-control" id="" cols="30" rows="1"></textarea>
                                        <!-- <input type="text" class="form-control" placeholder="Message..."> -->
                                        <button class="btn btn-light ms-2" type="submit"><i class="fas fa-paper-plane text-primary"></i></button>
                                    </div>
                            </form>
                                </div>
                        </div>
                    </div>
            </div>
        </main>
    </div>
</div>
</div>
<?php
require "footer.php";
?>