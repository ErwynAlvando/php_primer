<!-- Account Balance -->
<main id="main-route">
    <div class="main-content slot-game">
        <div class="container">
            <div class="slot-game__container">
                <div class="page-header">Arcade Fishing</div>
                <div class="slot-game-list">
                    <?php
                    $cuidTrigger = 1553;
                    $id_provider = 'fish';
                    $categories = 'arcade';
                    $user = $_SESSION['username'];
                    $getUser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$user'");
                    $infouser = mysqli_fetch_array($getUser);
                    $extplayer = $infouser['extplayer'];
                    $query = mysqli_query($koneksi, "SELECT * FROM games WHERE game_provider = '$id_provider' AND categories = '$categories' ");
                    function generateRandomRTP()
                    {
                        $minRTP = 80;
                        $maxRTP = 96;

                        // Menghasilkan nilai acak antara 80 dan 96
                        $randomRTP = rand($minRTP, $maxRTP);

                        return $randomRTP;
                    }
                    $randomRTP = generateRandomRTP();

                    while ($row = mysqli_fetch_array($query)) {
                        if (isset($_SESSION['username'])) {
                          $que = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$extplayer' AND status_game = 'offgame' ");

                          $cek = mysqli_num_rows($que);

                          if($cek > 0){
                            $link_url = 'index.php?pesan=22';
                        }else{
                            if ($id_login == '') {
                                $link_url = 'index.php?pesan=28';
                            }else{
                                $link_url = "/main/API/playGame.php?id=" . $row['id'] . "&p=" . $extplayer . "&ln=en&ct=slots";
                            }

                        }
                        ?>
                        <div class="slot-game-item slot-tg" style="display: block;">
                            <div class="slot-game-img">
                                <img src="<?php echo $row['game_image'] ?>" style="">
                            </div>
                            <div class="slot-game-name"><?php echo $row['game_name']; ?></div>
                            <div class="slot-game-hover">
                                <a class="main sekarang main-sekarang-alert" href="<?php echo $link_url ?>">
                                    Main Sekarang
                                </a>
                            </div>
                        </div>

                        <?php
                    } else {
                        ?>
                        <div class="slot-game-item slot-tg xbonus-buy-slot-games show" style="">
                            <div class="slot-game-img">
                                <img src="<?php echo $row['game_image'] ?>" style="">
                            </div>
                            <div class="slot-game-name"><?= $row['game_name'] ?></div>
                            <div class="progress baradjust">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" id="progress-rtp" role="progressbar" style="width:<?= $row['rtp'] ?>%;" aria-valuenow="81" aria-valuemin="0" aria-valuemax="100">
                                    RTP <?= $randomRTP ?>%
                                </div>
                            </div>
                            <div class="slot-game-hover">
                                <a class="main sekarang main-sekarang-alert" onclick='gameAlert()'>
                                    Main Sekarang
                                </a>
                            </div>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>

</main>