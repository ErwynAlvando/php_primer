<?php
include '../function/connect.php';
include '../main/API/config.php';
$id_login = $_SESSION['id'];
$extplayer = $_SESSION['extplayer'];

$query1 = mysqli_query($koneksi, "SELECT active FROM tb_saldo WHERE id_user = '$extplayer' ");
$liat = mysqli_fetch_array($query1);

$query2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id = '$id_login' ");
$punya_user = mysqli_fetch_array($query2);

$query3 = mysqli_query($koneksi, "SELECT * FROM tb_bank WHERE id_user = '$extplayer' ");
$bank_user = mysqli_fetch_array($query3);

$query3 = mysqli_query($koneksi, "SELECT * FROM tb_bank WHERE id_user = '$extplayer' ");
$b = mysqli_fetch_array($query3);

$query1010 = mysqli_query($koneksi, "SELECT * FROM tb_contact");
$ssa = mysqli_fetch_array($query1010);

$whatsapp = $ssa['no_whatsapp'];
$id_livechat = $ssa['id_livechat'];

$cuk = mysqli_query($koneksi, "SELECT * FROM tb_web");
$cek_web = mysqli_fetch_array($cuk);
$urlweb = $cek_web['url'];
$logo = $cek_web['logo'];
$warna = $cek_web['warna'];
$min_depo = $cek_web['min_depo'];
$min_wd = $cek_web['min_wd'];
$icon = $cek_web['icon_web'];
$title = $cek_web['title'];
$deskripsi = $cek_web['deskripsi'];
$keyword = $cek_web['keyword'];

$pisah = explode('|', $title);
$judul = trim($pisah[0]);

if ($punya_user['status'] == "Suspend") {
  
  session_destroy();
  header("Location:index.php?pesan=29");
}


?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="<?php echo $deskripsi ?>">
  <meta name="keywords" content="<?php echo $keyword ?>">
  <meta property="og:description" content="<?php echo $deskripsi ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $urlweb ?>">
  <meta property="og:image" content="<?php echo $urlweb ?>/assets/img/<?php echo $logo ?>">
  <meta name="robots" content="index, follow">
  <meta name="author" content="<?php echo $urlweb ?>">
  <meta name="theme-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
  <meta name="msapplication-TileColor" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
  <meta name="msapplication-navbutton-color" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
  <meta name="apple-mobile-web-app-status-bar-style" content="linear-gradient(to bottom, #ebf4f9 0%, #c3c0cc 100%)">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="https://images.linkcdn.cloud/V2/350/favicon/favicon-1815075327.png">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="googlebot-news" content="noindex">
  <!-- Canonical -->
  <link rel="canonical" href="<?php echo $urlweb ?>" />
  <!-- End Canonical -->
  <meta name="description" itemprop="description" content="<?php echo $deskripsi ?>" />
  <meta name="keywords" content="<?php echo $keyword ?>" />
  <title><?php echo $title; ?></title>
  <!-- Custom Tags -->
  <meta name="robots" content="index, follow" />
  <meta name="copyright" content="lexusmpo">
  <meta name="rating" content="general" />
  <meta name="geo.placename" content="Indonesia" />
  <meta name="geo.country" content="ID" />
  <meta name="language" content="ID" />
  <meta name="tgn.nation" content="Indonesia" />
  <meta name="rating" content="general" />
  <meta name="author" content="lexusmpo" />
  <!-- End Custom Tags -->
  <link rel="preload" as="font" href="themes/default/font/font-awesome/webfonts/fa-solid-900.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="preload" as="font" href="themes/default/font/font-awesome/webfonts/fa-brands-400.woff2" type="font/woff2" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="themes/default/css/global.css">
  <link rel="stylesheet" type="text/css" href="themes/default/font/font-awesome/css/all.min.css">

  <?php
  if ($warna == "abu-hitam") {
  ?>
    <link rel="stylesheet" id="templateStyle" type="text/css" href="abu-hitam/custom/css/style.css">
  <?php
  } else if ($warna == "merah-kuning") {
  ?>
    <link rel="stylesheet" id="templateStyle" type="text/css" href="merah-kuning/custom/css/style.css">
  <?php
  } else if ($warna == "biru-kuning") {
  ?>
    <link rel="stylesheet" id="templateStyle" type="text/css" href="biru-kuning/custom/css/style.css">
  <?php
  }
  ?>


  <link rel="stylesheet" type="text/css" href="themes/default/sass/custom.css">
</head>

<body>

  <header class="header">
    <div class="header__top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-flex align-items-center">
            <div class="header-time" id="headerTime"></div>
          </div>
          <div class="col-lg-6 d-flex align-items-center">
            <div class="header-marquee">
              <i class="fas fa-bullhorn"></i>
              <marquee class="marquee">
                <?php echo $title ?>
              </marquee>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="header-icons">
              <div id="header-lang" class="header-flag">
                <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png" alt="id">
                <i class="fas fa-caret-down"></i>

                <div id="lang-dropdown" class="flag-dropdown">
                  <a href="javascript:;" data-locale="id" name="locale-switch">
                    <div class="flag-item">
                      <img src="https://images.linkcdn.cloud/global/default/icon/lang/indonesia.png" alt="id">
                      <span>Indonesia</span>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header__mid">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 d-flex align-items-center">
            <div class="header-logo">
              <a href="?page=home">
                <img alt="WebsiteLogo" src="../assets/img/<?php echo $logo ?>" width="250" height="54">
              </a>
            </div>
          </div>
          <div class="col-lg-9">
            <?php
            if ($id_login == "") {
            ?>
              <br>
              <div class="header-form">
                <form name="login-form" action="function/cek_login.php" method="POST">
                  <input value="" name="username" type="text" placeholder="Nama Pengguna*" autocomplete="off" required>
                  <input value="" name="password" type="password" placeholder="Kata Sandi*" autocomplete="off" required>
                  <button name="submit" type="submit" class="button-login">Masuk</button>
                </form>
                <a id="register" href="?page=daftar" class="btn-daftar">Daftar</a>
              </div>
            <?php
            } else {
            ?>
              <div class="header-user">
                <span class="mr-1">Hi, </span>
                <?php
                $st = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE transaksi = 'Top Up' OR transaksi = 'Withdraw' AND id_user = '$extplayer' ");
                $hst = mysqli_num_rows($st);

                if ($hst < 11) {
                ?>
                  <div class="user-account">
                    <img src="../assets/img/img/New Player.svg" alt="">
                    <span onclick="location.href = '?page=profile'" class="username"><?php echo $punya_user['username'] ?></span>
                    <div class="account-status">
                      <div class="status-title">Status : <a href="?page=profil">New Player</a>
                      </div>
                      <div class="status-list">
                        <img src="../assets/img/img/New Player.svg" alt="" data-toggle="tooltip" data-placement="top" title="New Player">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Silver">
                        <img src="../assets/img/img/Gold.svg" alt="" data-toggle="tooltip" data-placement="top" title="Gold">
                        <img src="../assets/img/img/Platinum.svg" alt="" data-toggle="tooltip" data-placement="top" title="Platinum">
                      </div>
                    </div>
                  </div>

                <?php
                } else if ($hst < 26) {
                ?>
                  <div class="user-account">
                    <img src="../assets/img/img/Silver.svg" alt="">
                    <span onclick="location.href = '?page=profile'" class="username"><?php echo $punya_user['username'] ?></span>
                    <div class="account-status">
                      <div class="status-title">Status : <a href="?page=profil">Silver</a>
                      </div>
                      <div class="status-list">
                        <img src="../assets/img/img/New Player.svg" alt="" data-toggle="tooltip" data-placement="top" title="New Player">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Silver">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Gold">
                        <img src="../assets/img/img/Platinum.svg" alt="" data-toggle="tooltip" data-placement="top" title="Platinum">
                      </div>
                    </div>
                  </div>

                <?php
                } else if ($hst < 51) {
                ?>
                  <div class="user-account">
                    <img src="../assets/img/img/Gold.svg" alt="">
                    <span onclick="location.href = '?page=profile'" class="username"><?php echo $punya_user['username'] ?></span>
                    <div class="account-status">
                      <div class="status-title">Status : <a href="?page=profil">Gold</a>
                      </div>
                      <div class="status-list">
                        <img src="../assets/img/img/New Player.svg" alt="" data-toggle="tooltip" data-placement="top" title="New Player">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Silver">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Gold">
                        <img src="../assets/img/img/Platinum.svg" alt="" data-toggle="tooltip" data-placement="top" title="Platinum">
                      </div>
                    </div>
                  </div>

                <?php
                } else if ($hst > 50) {
                ?>
                  <div class="user-account">
                    <img src="../assets/img/img/Platinum.svg" alt="">
                    <span onclick="location.href = '?page=profile'" class="username"><?php echo $punya_user['username'] ?></span>
                    <div class="account-status">
                      <div class="status-title">Status : <a href="?page=profil">Platinum</a>
                      </div>
                      <div class="status-list">
                        <img src="../assets/img/img/New Player.svg" alt="" data-toggle="tooltip" data-placement="top" title="New Player">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Silver">
                        <img src="../assets/img/img/Silver.svg" alt="" data-toggle="tooltip" data-placement="top" title="Gold">
                        <img src="../assets/img/img/Platinum.svg" alt="" data-toggle="tooltip" data-placement="top" title="Platinum">
                      </div>
                    </div>
                  </div>

                <?php
                }
                ?>

                <div class="user-wallet ml-1">
                  <span>| TOTAL SALDO :</span>
                  <a href="#" name="refreshWallet"><span><i class="fa fa-sync"></i></span></a>
                  <a class="wallet-amount" id="wallet-amount" href="#" data-toggle="modal" data-target="#accountBalance">
                    IDR
                    <span id="mainBalance" name="mainBalance"><?php echo number_format($liat['active'], 0, ',', '.'); ?></span>
                  </a>
                </div>
              </div>
              <div class="header-form mb-2">
                <a class="btn-profil " href="?page=profile">Profil</a>
                <a class="btn-transaksi " href="?page=transaksi">Transaksi</a>
                <a class="btn-transaksi " href="?page=refferal">Refferal</a>
                <a class="btn-signout" href="function/logout.php">Keluar</a>
              </div>
          </div>
        </div>
      <?php
            }
      ?>

      </div>
    </div>
    </div>
    </div>
  </header>
  <div class="header-nav">
    <?php include 'template/nav.php'; ?>
  </div>
  <div class="header-mobile">
    <div class="header-mobile__top">
      <div class="mobile-logo">
        <a href="?page=home">
          <img src="../assets/img/<?php echo $logo ?>" alt="WebsiteLogo" width="125" height="27">
        </a>
      </div>
      <div class="mobile-button">
        <?php
        if ($id_login == "") {
        ?>
          <a class="mobile-button--register" href="?page=daftar">Daftar</a>
          <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
            <i class="fas fa-bars"></i>
          </div>
        <?php
        } else {
        ?>
          <div class="badge">
            <a href="#" class="text-white" name="refreshWallet"><span><i class="fa fa-sync"></i></span></a>
          </div>
          <div class="mobile-button--transaksi" href="#" data-toggle="modal" data-target="#accountBalance">
            <i class="fas fa-coins m-auto"></i> MYR :
            <a class="wallet-amount" id="wallet-amount"><span name="mainBalance"><?php echo number_format($liat['active'], 0, ',', '.'); ?></span></a>
          </div>
          <div data-target="slide-out" class="mobile-button--menu sidenav-toggle">
            <i class="fas fa-bars m-auto"></i>
          </div>
        <?php
        }
        ?>

      </div>
    </div>
    <div class="header-mobile__marquee">
      <i class="fas fa-bullhorn"></i>
      <marquee class="marquee"><?php echo $title ?></marquee>
      <a href="" style="line-height: 0;"><img class="pr-2" src="https://images.linkcdn.cloud/global/nav-addons/event.webp" alt="Event" width="85px"></a>
    </div>
  </div>
  <div id="overlay"></div>
  <?php include 'template/sidenav.php'; ?>

  <?php
  if ($_GET['page'] == "home") {
    include 'template/page/home.php';
  } else if ($_GET['page'] == "promosi") {
    include 'template/page/promosi.php';
  } else if ($_GET['page'] == "daftar") {
    include 'template/page/daftar.php';
  } else if ($_GET['page'] == "popular") {
    include 'template/page/popular.php';
  } else if ($_GET['page'] == "slot") {
    include 'template/page/slot.php';
  } else if ($_GET['page'] == "livegame") {
    include 'template/page/livegame.php';
  } else if ($_GET['page'] == "casino") {
    include 'template/page/casino.php';
  } else if ($_GET['page'] == "sport") {
    include 'template/page/sport.php';
  } else if ($_GET['page'] == "lottery") {
    include 'template/page/lottery.php';
  } else if ($_GET['page'] == "poker") {
    include 'template/page/poker.php';
  } else if ($_GET['page'] == "arcade") {
    include 'template/page/arcade.php';
  } else if ($_GET['page'] == "contact") {
    include 'template/page/contact.php';
  } else if ($_GET['page'] == "transaksi") {
    include 'template/page/transaksi.php';
  } else if ($_GET['page'] == "refferal") {
    include 'template/page/refferal.php';
  } else if ($_GET['page'] == "profile") {
    include 'template/page/profil.php';
  } else if ($_GET['page'] == "slot_pragmatic") {
    include 'template/page/menu_game/slot/pragmaticPlay.php';
  } else if ($_GET['page'] == "slot_joker") {
    include 'template/page/menu_game/slot/joker.php';	
  } else if ($_GET['page'] == "slot_microgaming") {
    include 'template/page/menu_game/slot/microgaming.php';
  } else if ($_GET['page'] == "slot_habanero") {
    include 'template/page/menu_game/slot/habanero.php';
  }else if ($_GET['page'] == "slot_wazdan") {
    include 'template/page/menu_game/slot/wazdan.php';
  } else if ($_GET['page'] == "slot_redtiger") {
    include 'template/page/menu_game/slot/redtiger.php';
  } else if ($_GET['page'] == "slot_pgsoft") {
    include 'template/page/menu_game/slot/pgsoft.php';
  } else if ($_GET['page'] == "slot_playngo") {
    include 'template/page/menu_game/slot/playngo.php';
  } else if ($_GET['page'] == "slot_playngo") {
    include 'template/page/menu_game/slot/playngo.php';
  } else if ($_GET['page'] == "spadegaming") {
    include 'template/page/menu_game/slot/spadegaming.php';
  } else if ($_GET['page'] == "slot_firekirin") {
    include 'template/page/menu_game/slot/firekirin.php';
  } else if ($_GET['page'] == "slot_rubyplay") {
    include 'template/page/menu_game/slot/rubyplay.php';
  } else if ($_GET['page'] == "slot_novomatic") {
    include 'template/page/menu_game/slot/novomatic.php';
  } else if ($_GET['page'] == "slot_apollo") {
    include 'template/page/menu_game/slot/apollo.php';
  }else if ($_GET['page'] == "slot_amatic") {
    include 'template/page/menu_game/slot/amatic.php';
  }else if ($_GET['page'] == "slot_kajot") {
    include 'template/page/menu_game/slot/kajot.php';
  }else if ($_GET['page'] == "slot_ainsworth") {
    include 'template/page/menu_game/slot/ainsworth.php';
  }else if ($_GET['page'] == "slot_quickspin") {
    include 'template/page/menu_game/slot/quickspin.php';
  }else if ($_GET['page'] == "slot_netent") {
    include 'template/page/menu_game/slot/netent.php';
  }else if ($_GET['page'] == "slot_igt") {
    include 'template/page/menu_game/slot/igt.php';
  }else if ($_GET['page'] == "slot_aristocrat") {
    include 'template/page/menu_game/slot/aristocrat.php';
  }else if ($_GET['page'] == "slot_igrosoft") {
    include 'template/page/menu_game/slot/igrosoft.php';
  }else if ($_GET['page'] == "slot_apex") {
    include 'template/page/menu_game/slot/apex.php';
  }else if ($_GET['page'] == "slot_merkur") {
    include 'template/page/menu_game/slot/merkur.php';
  }else if ($_GET['page'] == "slot_egt") {
    include 'template/page/menu_game/slot/egt.php';
  }




  else if ($_GET['page'] == "casino_pragmatic") {
    include 'template/page/menu_game/casino/pragmatic_play.php';
  } 

  else if ($_GET['page'] == "poker_amatic") {
    include 'template/page/menu_game/poker/amatic.php';
  } 

  else if ($_GET['page'] == "arcade_fishing") {
    include 'template/page/menu_game/arcade/arcade_fishing.php';
  } else if ($_GET['page'] == "detail_promo") {
    include 'template/page/menu_promosi/detail.php';
  } else {
    include 'template/page/home.php';
  }
  ?>

  <footer class="footer">
    <div class="footer__provider">
      <div class="container">
        <div class="provider-header">PROVIDER</div>
        <div class="provider-holder">
          <div class="provider-content">
            <div class="provider-title">
              <img title="Slot" alt="Slot" src="https://images.linkcdn.cloud/global/icon-footer/Slot.png" width="20" height="20">
              <span>SLOT</span>
            </div>
            <div class="provider-logo">
              <img alt="Pragmatic Play" title="Pragmatic Play" src="https://images.linkcdn.cloud/global/logo-footer/slot/pra_footer.png" width="100" height="50">
              <img alt="Spade Gaming" title="Spade Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/spd_footer.png" width="100" height="50">
              <img alt="PG Soft" title="PG Soft" src="https://images.linkcdn.cloud/global/logo-footer/slot/pgs_footer.png" width="100" height="50">
              <img alt="AIS GAMING" title="AIS GAMING" src="https://images.linkcdn.cloud/global/logo-footer/slot/aisg_footer.webp" width="100" height="50">
              <img alt="Fa Chai" title="Fa Chai" src="https://images.linkcdn.cloud/global/logo-footer/slot/fac_footer.webp" width="100" height="50">
              <img alt="RED TIGER" title="RED TIGER" src=" https://images.linkcdn.cloud/global/logo-footer/slot/rtr_footer.webp " width="100" height="50">
              <img alt="FASTSPIN" title="FASTSPIN" src="https://images.linkcdn.cloud/global/logo-footer/slot/fastspin_footer.png" width="100" height="50">
              <img alt="JILI" title="JILI" src="https://images.linkcdn.cloud/global/logo-footer/slot/jli_footer.webp" width="100" height="50">
              <img alt="HC Game" title="HC Game" src="https://images.linkcdn.cloud/global/logo-footer/slot/hcg_footer.png" width="100" height="50">
              <img alt="Advantplay" title="Advantplay" src="https://images.linkcdn.cloud/global/logo-footer/slot/adv_footer.png" width="100" height="50">
              <img alt="NoLimit City" title="NoLimit City" src="https://images.linkcdn.cloud/global/logo-footer/slot/nlc_footer.png" width="100" height="50">
              <img alt="JDB" title="JDB" src="https://images.linkcdn.cloud/global/logo-footer/slot/jdb_footer.webp" width="100" height="50">
              <img alt="Playstar" title="Playstar" src="https://images.linkcdn.cloud/global/logo-footer/slot/pls_footer.png" width="100" height="50">
              <img alt="VIVA" title="VIVA" src="https://images.linkcdn.cloud/global/logo-footer/slot/viva_footer.webp" width="100" height="50">
              <img alt="Joker Gaming" title="Joker Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/jok_footer.png" width="100" height="50">
              <img alt="Habanero" title="Habanero" src="https://images.linkcdn.cloud/global/logo-footer/slot/hbn_footer.png" width="100" height="50">
              <img alt="Afb Gaming" title="Afb Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/afg_footer.png" width="100" height="50">
              <img alt="CQ9 Gaming" title="CQ9 Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/cq9_footer.png" width="100" height="50">
              <img alt="Virtual Tech" title="Virtual Tech" src="https://images.linkcdn.cloud/global/logo-footer/slot/vrt_footer.png" width="100" height="50">
              <img alt="Ameba" title="Ameba" src="https://images.linkcdn.cloud/global/logo-footer/slot/amb_footer.png" width="100" height="50">
              <img alt="Top Trend Gaming" title="Top Trend Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/ttg_footer.png" width="100" height="50">
              <img alt="Microgaming" title="Microgaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/micro_logo.png" width="100" height="50">
              <img alt="Playtech Slot" title="Playtech Slot" src="https://images.linkcdn.cloud/global/logo-footer/slot/pla_footer.png" width="100" height="50">
              <img alt="Play N Go" title="Play N Go" src="https://images.linkcdn.cloud/global/logo-footer/slot/png_footer.png" width="100" height="50">
              <img alt="Hydako" title="Hydako" src="https://images.linkcdn.cloud/global/logo-footer/slot/hyd_footer.png" width="100" height="50">
              <img alt="N2Live Slot" title="N2Live Slot" src="https://images.linkcdn.cloud/global/logo-footer/casino/nli_footer.png" width="100" height="50">
            </div>
          </div>
          <div class="provider-content">
            <div class="provider-title">
              <img title="Casino" alt="Casino" src="https://images.linkcdn.cloud/global/icon-footer/Casino.png" width="20" height="20">
              <span>CASINO</span>
            </div>
            <div class="provider-logo">
              <img alt="AFB CASINO" title="AFB CASINO" src="https://images.linkcdn.cloud/global/logo-footer/casino/afc_footer.webp" width="100" height="50">
              <img alt="Pragmatic Play LC" title="Pragmatic Play LC" src="https://images.linkcdn.cloud/global/logo-footer/casino/plc_footer.png" width="100" height="50">
              <img alt="GD88" title="GD88" src="https://images.linkcdn.cloud/global/logo-footer/casino/gd8_footer.png" width="100" height="50">
              <img alt="WM Casino" title="WM Casino" src="https://images.linkcdn.cloud/global/logo-footer/casino/wmc_footer.png" width="100" height="50">
              <img alt="OG Casino" title="OG Casino" src="https://images.linkcdn.cloud/global/logo-footer/casino/ogs_footer.png" width="100" height="50">
              <img alt="Evolution" title="Evolution" src="https://images.linkcdn.cloud/global/logo-footer/casino/evolution_footer.webp" width="100" height="50">
              <img alt="ALLBET" title="ALLBET" src="https://images.linkcdn.cloud/global/logo-footer/casino/alb_footer.png" width="100" height="50">
              <img alt="Dream Gaming" title="Dream Gaming" src="https://images.linkcdn.cloud/global/logo-footer/casino/drg_footer.png" width="100" height="50">
              <img alt="Asia Gaming" title="Asia Gaming" src="https://images.linkcdn.cloud/global/logo-footer/casino/agc_footer.png" width="100" height="50">
              <img alt="Sexy Gaming" title="Sexy Gaming" src="https://images.linkcdn.cloud/global/logo-footer/casino/seg_footer.png" width="100" height="50">
              <img alt="WE CASINO" title="WE CASINO" src="https://images.linkcdn.cloud/global/logo-footer/casino/wec_footer.png" width="100" height="50">
              <img alt="LG88" title="LG88" src="https://images.linkcdn.cloud/global/logo-footer/casino/lg8_footer.png" width="100" height="50">
              <img alt="N2Live" title="N2Live" src="https://images.linkcdn.cloud/global/logo-footer/casino/nli_footer.png" width="100" height="50">
            </div>
          </div>
          <div class="provider-content">
            <div class="row">
              <div class="col-lg-6">
                <div class="provider-title">
                  <img title="Sportsbook" alt="Sportsbook" src="https://images.linkcdn.cloud/global/icon-footer/Sport.png" width="20" height="20">
                  <span>SPORTSBOOK</span>
                </div>
                <div class="provider-logo">
                  <img alt="AFB88" title="AFB88" src="https://images.linkcdn.cloud/global/logo-footer/sports/afb_footer.png" width="100" height="50">
                  <img alt="IA E-SPORT" title="IA E-SPORT" src="https://images.linkcdn.cloud/global/logo-footer/sports/iae_footer.png" width="100" height="50">
                  <img alt="SBO SPORT" title="SBO SPORT" src="https://images.linkcdn.cloud/global/logo-footer/sports/sbo_footer.png" width="100" height="50">
                  <img alt="CMD368" title="CMD368" src="https://images.linkcdn.cloud/global/logo-footer/sports/cmd_footer.png" width="100" height="50">
                  <img alt="M88 SPORTS" title="M88 SPORTS" src="https://images.linkcdn.cloud/global/logo-footer/sports/m88_footer.webp" width="100" height="50">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="provider-title">
                  <img title="Arcade" alt="Arcade" src="https://images.linkcdn.cloud/global/icon-footer/Arcade.png" width="20" height="20">
                  <span>ARCADE</span>
                </div>
                <div class="provider-logo">
                  <img alt="Spaceman" title="Spaceman" src="https://images.linkcdn.cloud/global/logo-footer/casino/spaceman_footer.webp" width="100" height="50">
                  <img alt="Joker Gaming" title="Joker Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/jok_footer.png" width="100" height="50">
                  <img alt="Fa Chai" title="Fa Chai" src="https://images.linkcdn.cloud/global/logo-footer/slot/fac_footer.webp" width="100" height="50">
                  <img alt="Fastspin" title="Fastspin" src="https://images.linkcdn.cloud/global/logo-footer/slot/fastspin_footer.png" width="100" height="50">
                  <img alt="JDB" title="JDB" src="https://images.linkcdn.cloud/global/logo-footer/slot/jdb_footer.webp" width="100" height="50">
                  <img alt="Spade Gaming" title="Spade Gaming" src="https://images.linkcdn.cloud/global/logo-footer/slot/spd_footer.png" width="100" height="50">
                  <img alt="SPRIBE" title="SPRIBE" src="https://images.linkcdn.cloud/global/logo-footer/slot/spr_footer.webp" width="100" height="50">
                  <img alt="JILI" title="JILI" src=" https://images.linkcdn.cloud/global/logo-footer/slot/jli_footer.webp " width="100" height="50">
                </div>
              </div>
            </div>
          </div>
          <div class="provider-content">
            <div class="row">
              <div class="col-lg-3">
                <div class="provider-title">
                  <img title="Live Game" alt="Live Game" src="https://images.linkcdn.cloud/global/icon-footer/Game Lain.png" width="20" height="20">
                  <span>LIVE GAME</span>
                </div>
                <div class="provider-logo">
                  <img alt="LIVE GAME" title="LIVE GAME" src="https://images.linkcdn.cloud/global/logo-footer/others/lvg_footer.png" width="100" height="50">
                  <img alt="WS168" title="WS168" src="https://images.linkcdn.cloud/global/logo-footer/others/ws1_footer.webp" width="100" height="50">
                  <img alt="MIKI Gaming" title="MIKI Gaming" src="https://images.linkcdn.cloud/global/logo-footer/others/mki_footer.png" width="100" height="50">
                  <img alt="SV388 Cockfight" title="SV388 Cockfight" src="https://images.linkcdn.cloud/global/logo-footer/others/sv3_footer.png" width="100" height="50">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="provider-title">
                  <img title="Lottery" alt="Lottery" src="https://images.linkcdn.cloud/global/icon-footer/Lottery.png" width="20" height="20">
                  <span>LOTTERY</span>
                </div>
                <div class="provider-logo">
                  <img alt="NEX4D" title="NEX4D" src="https://www.iplaybet2000.com/iplay/img/menu/4d-nex4d.png" width="100" height="50">
                </div>
              </div>
              <div class="col-lg-3">
                <div class="provider-title">
                  <img title="Poker" alt="Poker" src="https://images.linkcdn.cloud/global/icon-footer/Poker.png" width="20" height="20">
                  <span>POKER</span>
                </div>
                <div class="provider-logo">
                  <img alt="We1Poker" title="We1Poker" src="https://images.linkcdn.cloud/global/logo-footer/poker/we1_footer.png" width="100" height="50">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__trademark">Copyright &copy; 2024
      <a href="#"><?php echo $judul ?></a> is an international registered trademark. All rights reserved.</div>
  </footer>
  <div class="footer-mobile">
    <a class="footer-item active" href="?page=home">
      <div class="footer-icon"><i class="fas fa-home"></i></div>
      <div class="footer-title">Home</div>
    </a>
    <?php
    if ($id_login == false) {
    ?>
      <a class="footer-item" href="">
        <div class="footer-icon"><i class="fab fa-android"></i></div>
        <div class="footer-title">Apps</div>
      </a>
    <?php
    } else {
    ?>
      <a class="footer-item" href="?page=transaksi">
        <div class="footer-icon"><i class="fas fa-credit-card"></i></div>
        <div class="footer-title">Deposit</div>
      </a>
    <?php
    }
    ?>
    <?php
    if ($id_login == false) {
    ?>
      <a class="footer-item footer-login" href="#" data-toggle="modal" data-target="#loginModal">
        <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
        <div class="footer-title">Masuk</div>
      </a>
    <?php
    } else {
    ?>
      <a class="footer-item footer-login" href="?page=slot">
        <div class="footer-icon"><i class="fas fa-user-alt"></i></div>
        <div class="footer-title">Permainan</div>
      </a>
    <?php
    }
    ?>
    <a class="footer-item " href="?page=promosi">
      <div class="footer-icon"><i class="fas fa-tags"></i> <i class="fas fa-percent"></i></div>
      <div class="footer-title">Promosi</div>
    </a>
    <a class="footer-item" target="_blank" rel="noreferrer" href="https://direct.lc.chat/<?php echo $id_livechat ?>//">
      <div class="footer-icon"><i class="fas fa-comments"></i></div>
      <div class="footer-title">Live Chat</div>
    </a>
  </div>
  <!-- Modal -->
  <div class="modal fade custom-popup" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Formulir Login</h5>
        </div>

        <div class="modal-body">
          <div class="modal-body-form">
            <form name="login-form" action="function/cek_login.php" method="POST">
              <div class="form-item">
                <div class="item-title">Nama Pengguna*</div>
                <input value="" minlength="1" maxlength="25" type="text" name="username" placeholder="Nama Pengguna*" autocomplete="off" required>
              </div>
              <div class="form-item">
                <div class="item-title">Kata Sandi*</div>
                <input value="" minlength="5" maxlength="50" name="password" type="password" placeholder="Kata Sandi*" autocomplete="off" required>
              </div>
              <div class="form-button">
                <button name="submit" type="submit" class="button-login">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div style="position: fixed; bottom: 150px; left: 15px; z-index: 10; opacity: 0.98;"><a href="../rtp.php" rel="noopener" target="_blank"><img alt="rtp slot hari ini" class="wabutton" src="../assets/img/rtpslot.gif" style="height:70px; width:70px" title="Rtp Slot Hari Ini" /></a></div>

  <div style="position: fixed; bottom: 70px; left: 15px; z-index: 10; opacity: 0.98;"><a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>&text=Hallo." rel="noopener" target="_blank"><img alt="rtp slot hari ini" class="wabutton" src="../assets/img/img/5XfPeg3rs84k.gif" style="height:70px; width:70px" title="Rtp Slot Hari Ini" /></a></div>



  <script src="themes/default/js/vendor.js"></script>
  <script src="themes/default/js/global.js?v=2.0.1445"></script>


  <script src="themes/default/js/index.js?v=2.0.1445"></script>
  <script src="themes/default/vendor/jquery-validate/jquery.validate.min.js"></script>

  <?php if ($id_login != "") { ?>
  <script>
    autoTarik();
    function autoTarik() {
      var username = '<?= $_SESSION["username"] ?>';
      $.ajax({
        url: 'function/getBalances.php',
        data: {
          username
        },
        type: "POST",
        success: function(data) {}
      })
    }

    function tarikSaldo() {
      var username = '<?= $_SESSION["username"] ?>';
      $.ajax({
        url: 'function/getBalances.php',
        data: {
          username
        },
        type: "POST",
        success: function(data) {
          Swal.fire({
            icon: 'success',
            title: 'Saldo berhasil ditarik',
            text: 'Saldo Anda telah berhasil ditarik.',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Tutup',
          }).then((result) => {
            if (result.isConfirmed) {
              location.reload(true);
            }
          });
        },
        error: function(xhr, status, error) {
          console.error("Error:", error);
          Swal.fire({
            icon: 'error',
            title: 'Saldo gagal ditarik',
            text: 'Penarikan saldo anda gagal.',
            timerProgressBar: true,
            timer: 5000,
          });
        }
      });
    }
  </script>
  <?php } ?>

  <script>
    function gameAlert() {
      return Swal.fire({
        icon: 'info',
        title: "Perhatian.",
        html: "Silakan login untuk bermain!",
        timerProgressBar: true,
        timer: 5000,
      });
    }

    function gamemaintenance() {
      return Swal.fire({
        icon: 'info',
        title: "Opps.",
        html: "Provider Ini Sedang Dalam Proses Maintenance!",
        timerProgressBar: true,
        timer: 5000,
      });
    }
  </script>

  <?php
  if (!empty($_GET['pesan'])) {
    if ($_GET['pesan'] == 1) {
  ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Email Sudah Digunakan',
          text: 'Silakan coba email lain.'
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 2) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Captcha Anda Salah',
          text: 'Periksa Kembali Captcha Yang Anda Masukkan.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 3) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Selamat!',
          text: 'Akun Anda Berhasil Dibuat',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 4) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Password Dan Konfirmasi Harus Sama.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 5) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Daftar Akun Gagal.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 6) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Akun Anda Di Suspend Oleh Admin.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 7) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Username Dan Password Anda Salah.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 8) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Selamat!',
          text: 'Anda Berhasil Logout',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 9) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Selamat!',
          text: 'Deposit Berhasil Silahkan Menghubungi Admin Untuk Proses Konfirmasi',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 10) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Gagal Mengupload Gambar.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 11) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Ukuran File Terlalu Besar.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 12) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Ekstensi Gambar Harus Jpg atau png.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 13) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Anda Masih Memiliki Proses Deposit Yang Belum Selesai.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 14) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Maaf Promo ini hanya berlaku untuk New Member.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 15) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Maaf Nominal Deposit Tidak Sesuai Dengan Ketentuan Bonus.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 16) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps',
          text: 'Deposit Minimal <?php echo $min_depo; ?> Ya',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 17) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps',
          text: 'Maaf Anda belum mencapai Target Turn Over yg sudah di tentukan, silahkan bermain kembali untuk menyelesaikan target turn over anda',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 18) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Saldo Anda Tidak Mencukupi Untuk Melakukan Withdraw',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 19) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps',
          text: 'Withdraw Minimal <?php echo $min_wd; ?> Ya',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 20) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Selamat!',
          text: 'Withdraw Berhasil Silahkan Menghubungi Admin Untuk Proses Konfirmasi',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 21) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Anda Masih Memiliki Proses Withdraw Yang Belum Selesai.',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 22) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps',
          text: 'Segera Hubungi Admin',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 23) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Anda Harus Login Terlebih Dahulu',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 24) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Sorry!',
          text: 'Ubah Password Gagal',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 25) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Sorry!',
          text: 'Password Lama Anda Salah',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 26) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps!',
          text: 'Password Baru Dan Konfirmasi Harus sama',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }
    if ($_GET['pesan'] == 27) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'success',
          title: 'Selamat!',
          text: 'Password Anda Berhasil Di Ubah',
          timerProgressBar: true,
          timer: 5000,
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 28) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'info',
          title: 'Opps',
          text: 'Silakan Login Untuk Bermain'
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 29) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Maaf Akun Anda Telah Disuspend Oleh Admin'
        });
      </script>
    <?php
    }

    if ($_GET['pesan'] == 30) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Opps',
          text: 'Username Telah Di Gunakan, Silahkan Buat Username Lain'
        });
      </script>
  <?php
    }else if ($_GET['pesan'] == 31) {
    ?>
      <script type="text/javascript">
        Swal.fire({
          icon: 'error',
          title: 'Maaf',
          text: 'Game Sedang Dalam Perbaikan!'
        });
      </script>
  <?php
    }
  }
  ?>

  <?php if ($id_livechat !== 0) { ?>
    <script>
      window.__lc = window.__lc || {};
      window.__lc.license = <?php echo $id_livechat ?>;;
      (function(n, t, c) {
        function i(n) {
          return e._h ? e._h.apply(null, n) : e._q.push(n)
        }
        var e = {
          _q: [],
          _h: null,
          _v: "2.0",
          on: function() {
            i(["on", c.call(arguments)])
          },
          once: function() {
            i(["once", c.call(arguments)])
          },
          off: function() {
            i(["off", c.call(arguments)])
          },
          get: function() {
            if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
            return i(["get", c.call(arguments)])
          },
          call: function() {
            i(["call", c.call(arguments)])
          },
          init: function() {
            var n = t.createElement("script");
            n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
          }
        };
        !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
      }(window, document, [].slice))
    </script>
    <noscript>
      <a href="https://www.livechatinc.com/chat-with/<?php echo $id_livechat ?>/" rel="nofollow">Chat with us</a>
    </noscript>
  <?php } ?>
  </style>

<div class="fireworks-container"></div>

<script>
    $('<div id="histats_counter" style="display: none;"></div>').insertAfter($('.content'));
 $('<div class="fireworks-container"></div>').insertAfter($('.content'));
</script>

<script src="https://tbgroup-cdn.online/style/xx1toto/js/fireworks.js"></script>
<script>
    const container = document.querySelector('.fireworks-container')
    const fireworks = new Fireworks({
        target: container,
        hue: 120,
        startDelay: 1,
        minDelay: 20,
        maxDelay: 30,
        speed: 4,
        acceleration: 1.05,
        friction: 0.98,
        gravity: 1,
        particles: 75,
        trace: 3,
        explosion: 5,
        boundaries: {
            top: 50,
            bottom: container.clientHeight,
            left: 50,
            right: container.clientWidth
        }
    })
    // start fireworks
    fireworks.start()
</script>

<!-- Kepingan Salju
<script>Date.now||(Date.now=function(){return(new Date).getTime()}),function(){"use strict";for(var t=["webkit","moz"],e=0;e<t.length&&!window.requestAnimationFrame;++e){var i=t[e];window.requestAnimationFrame=window[i+"RequestAnimationFrame"],window.cancelAnimationFrame=window[i+"CancelAnimationFrame"]||window[i+"CancelRequestAnimationFrame"]}if(/iP(ad|hone|od).OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var s=0;window.requestAnimationFrame=function(t){var e=Date.now(),i=Math.max(s+16,e);return setTimeout(function(){t(s=i)},i-e)},window.cancelAnimationFrame=clearTimeout}}(),function(t){t.snowfall=function(e,i){function s(s,n,a,h,r){this.id=r,this.x=s,this.y=n,this.size=a,this.speed=h,this.step=0,this.stepSize=o(1,10)/100,i.collection&&(this.target=w[o(0,w.length-1)]);var l=null;i.image?(l=t(document.createElement("img")),l[0].src=i.image):(l=t(document.createElement("div")),l.css({background:i.flakeColor})),l.attr({"class":"snowfall-flakes",id:"flake-"+this.id}).css({width:this.size,height:this.size,position:i.flakePosition,top:this.y,left:this.x,fontSize:0,zIndex:i.flakeIndex}),t(e).get(0).tagName===t(document).get(0).tagName?(t("body").append(l),e=t("body")):t(e).append(l),this.element=document.getElementById("flake-"+this.id),this.update=function(){if(this.y+=this.speed,this.y>d-(this.size+6)&&this.reset(),this.element.style.top=this.y+"px",this.element.style.left=this.x+"px",this.step+=this.stepSize,this.x+=S===!1?Math.cos(this.step):S+Math.cos(this.step),i.collection&&this.x>this.target.x&&this.x<this.target.width+this.target.x&&this.y>this.target.y&&this.y<this.target.height+this.target.y){var t=this.target.element.getContext("2d"),e=this.x-this.target.x,s=this.y-this.target.y,n=this.target.colData;if(void 0!==n[parseInt(e)][parseInt(s+this.speed+this.size)]||s+this.speed+this.size>this.target.height)if(s+this.speed+this.size>this.target.height){for(;s+this.speed+this.size>this.target.height&&this.speed>0;)this.speed=.5;t.fillStyle="#fff",void 0==n[parseInt(e)][parseInt(s+this.speed+this.size)]?(n[parseInt(e)][parseInt(s+this.speed+this.size)]=1,t.fillRect(e,s+this.speed+this.size,this.size,this.size)):(n[parseInt(e)][parseInt(s+this.speed)]=1,t.fillRect(e,s+this.speed,this.size,this.size)),this.reset()}else this.speed=1,this.stepSize=0,parseInt(e)+1<this.target.width&&void 0==n[parseInt(e)+1][parseInt(s)+1]?this.x++:parseInt(e)-1>0&&void 0==n[parseInt(e)-1][parseInt(s)+1]?this.x--:(t.fillStyle="#fff",t.fillRect(e,s,this.size,this.size),n[parseInt(e)][parseInt(s)]=1,this.reset())}(this.x>c-f||this.x<f)&&this.reset()},this.reset=function(){this.y=0,this.x=o(f,c-f),this.stepSize=o(1,10)/100,this.size=o(100*i.minSize,100*i.maxSize)/100,this.speed=o(i.minSpeed,i.maxSpeed)}}function n(){for(l=0;l<h.length;l+=1)h[l].update();p=requestAnimationFrame(function(){n()})}var a={flakeCount:35,flakeColor:"#ffffff",flakePosition:"absolute",flakeIndex:999999,minSize:1,maxSize:2,minSpeed:1,maxSpeed:5,round:!1,shadow:!1,collection:!1,collectionHeight:40,deviceorientation:!1},i=t.extend(a,i),o=function(t,e){return Math.round(t+Math.random()*(e-t))};t(e).data("snowfall",this);var h=[],r=0,l=0,d=t(e).height(),c=t(e).width(),f=0,p=0;if(i.collection!==!1){var m=document.createElement("canvas");if(m.getContext&&m.getContext("2d"))for(var w=[],g=t(i.collection),u=i.collectionHeight,l=0;l<g.length;l++){var x=g[l].getBoundingClientRect(),z=t("<canvas/>",{"class":"snowfall-canvas"}),v=[];if(x.top-u>0){t("body").append(z),z.css({position:i.flakePosition,left:x.left+"px",top:x.top-u+"px"}).prop({width:x.width,height:u});for(var y=0;y<x.width;y++)v[y]=[];w.push({element:z.get(0),x:x.left,y:x.top-u,width:x.width,height:u,colData:v})}}else i.collection=!1}for(t(e).get(0).tagName===t(document).get(0).tagName&&(f=25),t(window).bind("resize",function(){d=t(e)[0].clientHeight,c=t(e)[0].offsetWidth}),l=0;l<i.flakeCount;l+=1)r=h.length,h.push(new s(o(f,c-f),o(0,d),o(100*i.minSize,100*i.maxSize)/100,o(i.minSpeed,i.maxSpeed),r));i.round&&t(".snowfall-flakes").css({"-moz-border-radius":i.maxSize,"-webkit-border-radius":i.maxSize,"border-radius":i.maxSize}),i.shadow&&t(".snowfall-flakes").css({"-moz-box-shadow":"1px 1px 1px #555","-webkit-box-shadow":"1px 1px 1px #555","box-shadow":"1px 1px 1px #555"});var S=!1;i.deviceorientation&&t(window).bind("deviceorientation",function(t){S=.1*t.originalEvent.gamma}),n(),this.clear=function(){t(e).children(".snowfall-flakes").remove(),t(".snowfall-canvas").remove(),h=[],cancelAnimationFrame(p)}},t.fn.snowfall=function(e){return"object"==typeof e||void 0==e?this.each(function(){new t.snowfall(this,e)}):"string"==typeof e?this.each(function(){var e=t(this).data("snowfall");e&&e.clear()}):void 0}}(jQuery);</script><script>$(document).snowfall({flakeCount : 100, maxSpeed : 10, flakeColor: "white", minSize: 1, maxSize: 5, round: true});
</script> -->

<!-- Salju -->
<style>
/* customizable snowflake styling */
.snowflake {
  color: #fff;
  font-size: 1em;
  font-family: Arial, sans-serif;
  text-shadow: 0 0 5px #000;
}

@-webkit-keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@-webkit-keyframes snowflakes-shake{0%,100%{-webkit-transform:translateX(0);transform:translateX(0)}50%{-webkit-transform:translateX(80px);transform:translateX(80px)}}@keyframes snowflakes-fall{0%{top:-10%}100%{top:100%}}@keyframes snowflakes-shake{0%,100%{transform:translateX(0)}50%{transform:translateX(80px)}}.snowflake{position:fixed;top:-10%;z-index:9999;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default;-webkit-animation-name:snowflakes-fall,snowflakes-shake;-webkit-animation-duration:10s,3s;-webkit-animation-timing-function:linear,ease-in-out;-webkit-animation-iteration-count:infinite,infinite;-webkit-animation-play-state:running,running;animation-name:snowflakes-fall,snowflakes-shake;animation-duration:10s,3s;animation-timing-function:linear,ease-in-out;animation-iteration-count:infinite,infinite;animation-play-state:running,running}.snowflake:nth-of-type(0){left:1%;-webkit-animation-delay:0s,0s;animation-delay:0s,0s}.snowflake:nth-of-type(1){left:10%;-webkit-animation-delay:1s,1s;animation-delay:1s,1s}.snowflake:nth-of-type(2){left:20%;-webkit-animation-delay:6s,.5s;animation-delay:6s,.5s}.snowflake:nth-of-type(3){left:30%;-webkit-animation-delay:4s,2s;animation-delay:4s,2s}.snowflake:nth-of-type(4){left:40%;-webkit-animation-delay:2s,2s;animation-delay:2s,2s}.snowflake:nth-of-type(5){left:50%;-webkit-animation-delay:8s,3s;animation-delay:8s,3s}.snowflake:nth-of-type(6){left:60%;-webkit-animation-delay:6s,2s;animation-delay:6s,2s}.snowflake:nth-of-type(7){left:70%;-webkit-animation-delay:2.5s,1s;animation-delay:2.5s,1s}.snowflake:nth-of-type(8){left:80%;-webkit-animation-delay:1s,0s;animation-delay:1s,0s}.snowflake:nth-of-type(9){left:90%;-webkit-animation-delay:3s,1.5s;animation-delay:3s,1.5s}.snowflake:nth-of-type(10){left:25%;-webkit-animation-delay:2s,0s;animation-delay:2s,0s}.snowflake:nth-of-type(11){left:65%;-webkit-animation-delay:4s,2.5s;animation-delay:4s,2.5s}
</style>
<div class="snowflakes" aria-hidden="true">
<div class="snowflake"><img src="https://i.postimg.cc/bNrjGVyN/Kantong-Emas.png" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/MHZPC6bw/x1000.png" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/Jh9sgWG0/50c6fa4a-4661-4ac6-8c41-938c8eea873f.png" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/1txMcX13/big-win.png
" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/1txMcX13/big-win.png
" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/VNLPfFxf/3.png" alt="." width="50" height="50">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/m20v9sK5/mahjong-ways2-s-scatter.png" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/gcsFJHmk/x500.png" alt="." width="70" height="70">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/htNhGMjz/gates-of-olympus-logo.png" alt="." width="70" height="50">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/J7p2Kt2H/38698a-6c4901e0631345c29e9578691dbcb50d-mv2.gif" alt="." width="70" height="50">
</div>
<div class="snowflake"><img src="https://i.postimg.cc/023HRFx8/spaceman.gif" alt="." width="150" height="100">
</div>
</body>
</html>

<custom-script>
</custom-script>