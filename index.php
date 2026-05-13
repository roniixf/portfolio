<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>RAZOR GAMING DEV - Jasa Pembuatan Web Slot & Gambling</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}

:root{
  --bg:#010a14;
  --blue:#00aaff;
  --blue-hi:#33bbff;
  --blue-glow:#55ccff;
  --blue-pale:#88ddff;
  --blue-shim:#aaeeff;
  --white:#fff;
  --muted:#7ec8e3;
  --card-bg:rgba(0,25,55,.7);
  --card-bd:rgba(0,170,255,.25);
  --card-bd-hi:rgba(68,204,255,.7);
}

body{
  background:var(--bg);
  color:var(--white);
  font-family:'Rajdhani',sans-serif;
  min-height:100vh;
  overflow-x:hidden;
}

body::before{
  content:'';position:fixed;inset:0;
  background:
    radial-gradient(ellipse 70% 50% at 30% 0%,rgba(0,170,255,.06) 0%,transparent 60%),
    radial-gradient(ellipse 50% 40% at 70% 100%,rgba(0,212,255,.04) 0%,transparent 60%);
  z-index:0;pointer-events:none;
}

@keyframes shimmer{0%{background-position:-200% center}100%{background-position:200% center}}
@keyframes bShimmer{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
@keyframes slideUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes pFloat{0%{opacity:0;transform:translateY(100vh) scale(0)}10%{opacity:.6}90%{opacity:.6}100%{opacity:0;transform:translateY(-10vh) scale(1)}}
@keyframes shineSweep{0%{left:-50%}100%{left:150%}}
@keyframes dotPulse{0%,100%{box-shadow:0 0 0 0 rgba(0,170,255,.5)}50%{box-shadow:0 0 0 8px rgba(0,170,255,0)}}

/* ===== HEADER ===== */
.header{
  width:100%;
  background:rgba(1,10,20,.94);
  backdrop-filter:blur(20px);
  -webkit-backdrop-filter:blur(20px);
  border-bottom:1px solid var(--card-bd);
  display:flex;justify-content:space-between;align-items:center;
  padding:0 40px;height:72px;
  position:sticky;top:0;z-index:9999;
  transition:all .3s ease;
}
.header.scrolled{
  height:60px;
  box-shadow:0 4px 30px rgba(0,170,255,.12);
  border-bottom-color:var(--card-bd-hi);
}

.logo{
  display:flex;align-items:center;gap:12px;
  text-decoration:none;z-index:10;
}
.logo-icon{width:42px;height:42px;display:flex;align-items:center;justify-content:center}
.logo-icon svg{width:42px;height:42px;filter:drop-shadow(0 0 10px rgba(0,170,255,.6))}

.logo-text{
  font-family:'Orbitron',sans-serif;
  font-size:20px;font-weight:800;letter-spacing:2px;
  background:linear-gradient(90deg,var(--blue-pale) 0%,var(--blue-shim) 20%,#fff 50%,var(--blue-shim) 80%,var(--blue-pale) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  background-clip:text;
  animation:shimmer 3.5s linear infinite;
}
.logo-sub{font-size:10px;color:var(--muted);letter-spacing:4px;text-transform:uppercase;margin-top:-2px}

/* ===== DESKTOP MENU ===== */
.menu{display:flex;gap:6px;align-items:center}
.menu a{
  color:var(--muted);text-decoration:none;
  font-size:15px;font-weight:600;letter-spacing:1px;text-transform:uppercase;
  padding:8px 16px;border-radius:8px;transition:all .3s ease;position:relative;
}
.menu a::before{
  content:'';position:absolute;bottom:0;left:50%;width:0;height:2px;
  background:linear-gradient(90deg,transparent,var(--blue),transparent);
  transition:all .3s ease;transform:translateX(-50%);
}
.menu a:hover{color:#fff;background:rgba(0,170,255,.08)}
.menu a:hover::before{width:80%}
.menu a.menu-hi{color:var(--blue-hi);border:1px solid rgba(0,170,255,.35)}
.menu a.menu-hi:hover{background:rgba(0,170,255,.15);border-color:var(--blue);box-shadow:0 0 18px rgba(0,170,255,.25)}

/* ===== HAMBURGER ===== */
.hamburger{
  display:none;flex-direction:column;gap:5px;
  cursor:pointer;z-index:10001;padding:8px;border:none;background:none;
}
.hamburger span{display:block;width:26px;height:2px;background:var(--blue-pale);border-radius:2px;transition:all .3s ease}
.hamburger.active span:nth-child(1){transform:rotate(45deg) translate(5px,5px)}
.hamburger.active span:nth-child(2){opacity:0}
.hamburger.active span:nth-child(3){transform:rotate(-45deg) translate(5px,-5px)}

/* ===== MOBILE MENU OVERLAY ===== */
.mob-menu{
  display:none;position:fixed;inset:0;
  background:rgba(1,10,20,.97);backdrop-filter:blur(30px);
  z-index:10000;flex-direction:column;justify-content:center;align-items:center;gap:8px;
}
.mob-menu.active{display:flex}

/* Tombol X close di mobile menu */
.mob-close{
  position:absolute;top:20px;right:24px;
  width:48px;height:48px;border-radius:50%;
  background:rgba(0,170,255,.1);border:2px solid rgba(0,170,255,.4);
  color:var(--blue-shim);font-size:22px;
  cursor:pointer;display:flex;align-items:center;justify-content:center;
  transition:all .3s ease;z-index:10002;
}
.mob-close:hover{
  background:rgba(0,170,255,.25);border-color:var(--blue-hi);
  box-shadow:0 0 20px rgba(0,170,255,.4);color:#fff;
  transform:rotate(90deg);
}

.mob-menu a{
  color:var(--muted);text-decoration:none;
  font-family:'Orbitron',sans-serif;font-size:17px;font-weight:600;
  letter-spacing:3px;text-transform:uppercase;
  padding:16px 40px;border-radius:12px;transition:all .3s ease;
  width:80%;max-width:300px;text-align:center;
}
.mob-menu a:hover{color:#fff;background:rgba(0,170,255,.1);border:1px solid var(--card-bd)}

/* ===== BANNER ===== */
.banner-section{position:relative;z-index:1}

.shim-line{
  height:3px;
  background:linear-gradient(90deg,
    transparent 0%,var(--blue) 10%,var(--blue-shim) 25%,#fff 50%,var(--blue-shim) 75%,var(--blue) 90%,transparent 100%);
  background-size:300% 100%;
  animation:bShimmer 3s ease infinite;
}

.banner-wrap{
  position:relative;max-width:1700px;margin:0 auto;
  background:#000;overflow:hidden;
}

.banner{
  position:relative;width:100%;height:500px;overflow:hidden;
}

.slides-box{position:relative;width:100%;height:100%;overflow:hidden}

.slides{
  display:flex;height:100%;
  transition:transform .8s cubic-bezier(.65,0,.35,1);
}

.slide{
  min-width:100%;height:100%;position:relative;
}

/* GAMBAR BANNER — CERAH JELAS, TANPA OVERLAY GELAP */
.slide img{
  width:100%;height:100%;
  object-fit:cover;display:block;
  filter:brightness(1.1) contrast(1.08) saturate(1.15);
}

/* Gradient cuma 50px di bawah untuk transisi halus ke background */
.slide::after{
  content:'';position:absolute;bottom:0;left:0;right:0;
  height:50px;
  background:linear-gradient(to top,rgba(1,10,20,.6),transparent);
  pointer-events:none;
}

/* Shimmer sweep — sangat tipis */
.slides-box::after{
  content:'';position:absolute;top:0;left:-50%;
  width:35%;height:100%;
  background:linear-gradient(90deg,transparent,rgba(170,238,255,.02),rgba(255,255,255,.04),rgba(170,238,255,.02),transparent);
  z-index:3;
  animation:shineSweep 5s ease-in-out infinite;
  pointer-events:none;
}

/* Vignette tipis di kiri kanan saja */
.banner::before{
  content:'';position:absolute;inset:0;
  background:
    linear-gradient(to right,rgba(1,10,20,.2) 0%,transparent 5%),
    linear-gradient(to left,rgba(1,10,20,.2) 0%,transparent 5%);
  z-index:2;pointer-events:none;
}

/* Teks banner — posisi aman tidak menutupi gambar */
.b-text{
  position:absolute;bottom:28px;left:36px;
  z-index:5;pointer-events:none;
}

.b-text h2{
  font-family:'Orbitron',sans-serif;
  font-size:32px;font-weight:900;letter-spacing:3px;
  margin-bottom:4px;
}

.b-text h2 span{
  background:linear-gradient(90deg,#fff 0%,var(--blue-shim) 25%,#fff 50%,var(--blue-shim) 75%,#fff 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  background-clip:text;
  animation:shimmer 3s linear infinite;
  filter:drop-shadow(0 2px 10px rgba(0,0,0,.95)) drop-shadow(0 0 25px rgba(0,170,255,.5));
}

.b-text p{
  font-size:17px;font-weight:600;color:var(--blue-pale);
  letter-spacing:2px;
  text-shadow:0 1px 8px rgba(0,0,0,.95),0 0 20px rgba(0,170,255,.4);
}

/* Arrows — z-index tinggi agar tidak tertutup */
.b-arr{
  position:absolute;top:50%;transform:translateY(-50%);
  z-index:20;width:56px;height:56px;border-radius:50%;
  background:rgba(0,20,50,.65);
  border:2px solid rgba(0,170,255,.45);
  color:var(--blue-shim);font-size:20px;
  cursor:pointer;display:flex;align-items:center;justify-content:center;
  transition:all .3s ease;backdrop-filter:blur(8px);
}
.b-arr:hover{
  background:rgba(0,170,255,.3);border-color:var(--blue-hi);
  box-shadow:0 0 35px rgba(0,170,255,.5),inset 0 0 20px rgba(0,170,255,.15);
  transform:translateY(-50%) scale(1.12);color:#fff;
}
.b-arr.l{left:20px}
.b-arr.r{right:20px}

/* Dots — z-index tinggi */
.b-dots{
  position:absolute;bottom:24px;right:36px;
  display:flex;gap:14px;z-index:20;align-items:center;
}
.b-dots span{
  width:14px;height:14px;border-radius:50%;
  background:rgba(255,255,255,.2);
  border:2px solid rgba(0,170,255,.45);
  cursor:pointer;transition:all .4s ease;
}
.b-dots span.on{
  background:var(--blue);border-color:var(--blue-glow);
  box-shadow:0 0 18px rgba(0,170,255,.7),0 0 6px rgba(0,170,255,1);
  transform:scale(1.3);
  animation:dotPulse 2s ease infinite;
}
.b-dots span:hover:not(.on){background:rgba(0,170,255,.4);border-color:rgba(0,170,255,.6)}

/* Counter — z-index tinggi */
.b-counter{
  position:absolute;top:18px;right:36px;z-index:20;
  font-family:'Orbitron',sans-serif;font-size:13px;font-weight:600;
  color:rgba(255,255,255,.5);letter-spacing:3px;
  background:rgba(0,15,35,.55);padding:6px 16px;border-radius:20px;
  border:1px solid rgba(0,170,255,.2);backdrop-filter:blur(8px);
}
.b-counter .cur{color:var(--blue-glow);font-size:16px;text-shadow:0 0 12px rgba(85,204,255,.5)}

/* Corner deco */
.b-corn{position:absolute;width:40px;height:40px;z-index:6;pointer-events:none}
.b-corn::before,.b-corn::after{content:'';position:absolute;background:var(--blue);opacity:.35}
.b-corn.tl{top:12px;left:12px}
.b-corn.tl::before{top:0;left:0;width:20px;height:2px}
.b-corn.tl::after{top:0;left:0;width:2px;height:20px}
.b-corn.tr{top:12px;right:12px}
.b-corn.tr::before{top:0;right:0;width:20px;height:2px}
.b-corn.tr::after{top:0;right:0;width:2px;height:20px}
.b-corn.bl{bottom:12px;left:12px}
.b-corn.bl::before{bottom:0;left:0;width:20px;height:2px}
.b-corn.bl::after{bottom:0;left:0;width:2px;height:20px}
.b-corn.br{bottom:12px;right:12px}
.b-corn.br::before{bottom:0;right:0;width:20px;height:2px}
.b-corn.br::after{bottom:0;right:0;width:2px;height:20px}

/* ===== SECTION TITLE ===== */
.sec-title{
  display:flex;align-items:center;gap:16px;
  margin-bottom:30px;padding-bottom:16px;
  border-bottom:1px solid var(--card-bd);
}
.sec-title .bar{
  width:4px;height:36px;
  background:linear-gradient(to bottom,var(--blue),#00d4ff);
  border-radius:2px;box-shadow:0 0 12px rgba(0,170,255,.4);
}
.sec-title h2{
  font-family:'Orbitron',sans-serif;font-size:20px;font-weight:700;
  letter-spacing:2px;
  background:linear-gradient(90deg,var(--blue-pale),var(--blue-shim),#fff);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  background-clip:text;animation:shimmer 5s linear infinite;
}
.sec-title .cnt{
  margin-left:auto;font-size:14px;color:var(--muted);
  letter-spacing:2px;text-transform:uppercase;
}

/* ===== CONTAINER ===== */
.container{
  width:95%;max-width:1700px;margin:auto;
  padding:40px 0 60px;position:relative;z-index:1;
}

/* ===== GRID ===== */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fill,minmax(260px,1fr));
  gap:24px;
}

/* ===== CARD ===== */
.card{
  background:var(--card-bg);
  border:1px solid var(--card-bd);
  border-radius:16px;overflow:hidden;
  transition:all .4s cubic-bezier(.4,0,.2,1);
  position:relative;backdrop-filter:blur(10px);
  animation:slideUp .6s ease forwards;opacity:0;
}
.card::before{
  content:'';position:absolute;top:0;left:-100%;
  width:100%;height:100%;
  background:linear-gradient(90deg,transparent,rgba(0,170,255,.06),transparent);
  transition:left .6s ease;z-index:1;pointer-events:none;
}
.card:hover::before{left:100%}
.card:hover{
  transform:translateY(-10px);border-color:var(--card-bd-hi);
  box-shadow:0 20px 40px rgba(0,0,0,.4),0 0 30px rgba(0,170,255,.15),inset 0 1px 0 rgba(85,204,255,.1);
}

.card-img{position:relative;overflow:hidden;background:#020a18;height:260px}
.card-img::after{
  content:'';position:absolute;bottom:0;left:0;right:0;
  height:40px;background:linear-gradient(to top,var(--card-bg),transparent);
  pointer-events:none;
}
.card-img img{
  width:100%;height:100%;object-fit:contain;padding:12px;
  transition:transform .5s cubic-bezier(.4,0,.2,1);
}
.card:hover .card-img img{transform:scale(1.08)}

.card-badge{
  position:absolute;top:12px;right:12px;
  background:linear-gradient(135deg,var(--blue),#00d4ff);
  color:#fff;font-family:'Orbitron',sans-serif;
  font-size:10px;font-weight:700;padding:4px 10px;
  border-radius:6px;letter-spacing:1px;z-index:2;
  box-shadow:0 4px 12px rgba(0,170,255,.4);
}

.info{padding:16px 18px 18px;position:relative;z-index:2}
.info h3{font-size:15px;font-weight:600;color:#fff;margin-bottom:8px;line-height:1.3;letter-spacing:.5px}
.price{
  font-family:'Orbitron',sans-serif;color:var(--blue-glow);
  margin-bottom:14px;font-weight:700;font-size:16px;
  text-shadow:0 0 20px rgba(85,204,255,.3);
}

.btn-row{display:flex;gap:8px}
.btn-row .btn{
  flex:1;display:flex;align-items:center;justify-content:center;gap:6px;
  text-align:center;font-size:14px;font-weight:700;
  letter-spacing:1px;text-transform:uppercase;
  padding:10px 8px;border-radius:10px;
  text-decoration:none;border:none;cursor:pointer;
  transition:all .3s ease;
}
.btn-buy{
  background:linear-gradient(135deg,var(--blue),#00d4ff);
  color:#fff;box-shadow:0 4px 15px rgba(0,170,255,.3);
}
.btn-buy:hover{box-shadow:0 6px 25px rgba(0,170,255,.5);transform:translateY(-2px)}
.btn-view{
  background:rgba(0,170,255,.08);color:var(--blue-pale);
  border:1px solid var(--card-bd)!important;
}
.btn-view:hover{background:rgba(0,170,255,.15);border-color:var(--card-bd-hi)!important}

/* ===== POPUP ===== */
#popupImg{
  display:none;position:fixed;inset:0;
  background:rgba(1,10,20,.97);backdrop-filter:blur(20px);
  z-index:99999;justify-content:center;align-items:center;
  flex-direction:column;gap:20px;padding:20px;
}
#popupImg.active{display:flex}
#showImg{
  max-width:90%;max-height:78vh;border-radius:16px;
  border:1px solid var(--card-bd);
  box-shadow:0 0 60px rgba(0,170,255,.15);
  object-fit:contain;background:#020a18;
}
.close-btn{
  display:flex;align-items:center;gap:8px;
  padding:12px 30px;background:rgba(0,170,255,.1);
  border:1px solid var(--card-bd);border-radius:12px;
  color:var(--blue-pale);font-size:15px;font-weight:600;
  letter-spacing:2px;text-transform:uppercase;
  cursor:pointer;transition:all .3s ease;
}
.close-btn:hover{
  background:rgba(0,170,255,.2);border-color:var(--blue);
  box-shadow:0 0 20px rgba(0,170,255,.2);
}

/* ===== FOOTER ===== */
.footer{
  position:relative;z-index:1;
  background:rgba(1,10,20,.9);
  border-top:1px solid var(--card-bd);
  padding:40px;text-align:center;
}
.footer-logo{
  font-family:'Orbitron',sans-serif;font-size:18px;font-weight:800;
  letter-spacing:3px;
  background:linear-gradient(90deg,var(--blue-pale),var(--blue-shim),#fff,var(--blue-shim),var(--blue-pale));
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;
  background-clip:text;animation:shimmer 4s linear infinite;
  margin-bottom:12px;
}
.footer-text{color:var(--muted);font-size:14px;letter-spacing:1px}
.footer-socials{display:flex;justify-content:center;gap:16px;margin-top:16px}
.footer-socials a{
  width:40px;height:40px;border-radius:10px;
  border:1px solid var(--card-bd);
  display:flex;align-items:center;justify-content:center;
  color:var(--muted);text-decoration:none;transition:all .3s ease;font-size:16px;
}
.footer-socials a:hover{
  color:var(--blue-glow);border-color:var(--blue);
  background:rgba(0,170,255,.1);box-shadow:0 0 15px rgba(0,170,255,.2);
  transform:translateY(-3px);
}

/* ===== PARTICLES ===== */
.particles{position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden}
.particle{
  position:absolute;width:2px;height:2px;
  background:var(--blue);border-radius:50%;opacity:0;
  animation:pFloat linear infinite;
}

/* ===== RESPONSIVE ===== */
@media(max-width:1024px){
  .grid{grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:18px}
  .banner{height:400px}
  .card-img{height:220px}
  .b-text h2{font-size:24px}
  .b-text p{font-size:14px}
}

@media(max-width:768px){
  .header{padding:0 16px;height:60px}
  .header.scrolled{height:54px}
  .menu{display:none}
  .hamburger{display:flex}
  .logo-text{font-size:15px;letter-spacing:1px}
  .logo-sub{font-size:8px;letter-spacing:3px}
  .logo-icon svg{width:32px;height:32px}
  .logo-icon{width:32px;height:32px}

  .banner{height:240px}
  .slide img{filter:brightness(1.15) contrast(1.05) saturate(1.1)}
  .b-arr{width:40px;height:40px;font-size:14px}
  .b-arr.l{left:10px}
  .b-arr.r{right:10px}
  .b-text{left:16px;bottom:16px}
  .b-text h2{font-size:16px;letter-spacing:1.5px}
  .b-text p{font-size:11px;letter-spacing:1px}
  .b-dots{right:14px;bottom:14px;gap:10px}
  .b-dots span{width:10px;height:10px}
  .b-counter{top:10px;right:14px;font-size:11px;padding:4px 12px}
  .b-counter .cur{font-size:13px}
  .b-corn{display:none}

  .container{width:94%;padding:24px 0 40px}
  .sec-title h2{font-size:17px}
  .sec-title .cnt{display:none}
  .grid{grid-template-columns:repeat(2,1fr);gap:12px}
  .card-img{height:160px}
  .card-img img{padding:8px}
  .info{padding:10px 12px 14px}
  .info h3{font-size:12px;margin-bottom:4px}
  .price{font-size:13px;margin-bottom:10px}
  .btn-row .btn{font-size:11px;padding:8px 4px;border-radius:8px}
  .card{border-radius:12px}
  .card-badge{font-size:8px;padding:3px 7px;top:8px;right:8px}
  .footer{padding:28px 20px}
  .footer-logo{font-size:15px}
  .footer-text{font-size:12px}
}

@media(max-width:420px){
  .grid{gap:10px}
  .card-img{height:140px}
  .info h3{font-size:11px}
  .price{font-size:12px}
  .btn-row .btn{font-size:10px;padding:7px 3px}
  .logo-text{font-size:13px}
  .logo-sub{display:none}
  .banner{height:190px}
  .b-text h2{font-size:13px}
  .b-text p{display:none}
  .b-counter{display:none}
}

.card:nth-child(1){animation-delay:.05s}
.card:nth-child(2){animation-delay:.1s}
.card:nth-child(3){animation-delay:.15s}
.card:nth-child(4){animation-delay:.2s}
.card:nth-child(5){animation-delay:.25s}
.card:nth-child(6){animation-delay:.3s}
.card:nth-child(7){animation-delay:.35s}
.card:nth-child(8){animation-delay:.4s}
.card:nth-child(9){animation-delay:.45s}
.card:nth-child(10){animation-delay:.5s}
.card:nth-child(11){animation-delay:.55s}
.card:nth-child(12){animation-delay:.6s}
.card:nth-child(13){animation-delay:.65s}
.card:nth-child(14){animation-delay:.7s}
.card:nth-child(15){animation-delay:.75s}
.card:nth-child(16){animation-delay:.8s}
.card:nth-child(17){animation-delay:.85s}
.card:nth-child(18){animation-delay:.9s}
.card:nth-child(19){animation-delay:.95s}
.card:nth-child(20){animation-delay:1s}
.card:nth-child(21){animation-delay:1.05s}
.card:nth-child(22){animation-delay:1.1s}
.card:nth-child(23){animation-delay:1.15s}
.card:nth-child(24){animation-delay:1.2s}
.card:nth-child(25){animation-delay:1.25s}

::-webkit-scrollbar{width:8px}
::-webkit-scrollbar-track{background:var(--bg)}
::-webkit-scrollbar-thumb{background:linear-gradient(to bottom,var(--blue),#00d4ff);border-radius:4px}
::-webkit-scrollbar-thumb:hover{background:var(--blue-glow)}
::selection{background:rgba(0,170,255,.3);color:#fff}
</style>
</head>
<body>

<div class="particles" id="particles"></div>

<!-- HEADER -->
<header class="header" id="header">
  <a href="#" class="logo">
    <div class="logo-icon">
      <svg viewBox="0 0 42 42" fill="none"><path d="M8 6L4 21L8 36H12L16 21L12 6H8Z" fill="url(#g1)" opacity=".9"/><path d="M14 6L10 21L14 36H18L22 21L18 6H14Z" fill="url(#g1)" opacity=".7"/><path d="M20 4L16 21L20 38H24L28 21L24 4H20Z" fill="url(#g2)"/><path d="M26 6L22 21L26 36H30L34 21L30 6H26Z" fill="url(#g1)" opacity=".7"/><path d="M32 6L28 21L32 36H36L40 21L36 6H32Z" fill="url(#g1)" opacity=".9"/><line x1="4" y1="21" x2="40" y2="21" stroke="#44ccff" stroke-width="1" opacity=".5"/><defs><linearGradient id="g1" x1="4" y1="6" x2="40" y2="36"><stop stop-color="#00aaff"/><stop offset="1" stop-color="#00d4ff"/></linearGradient><linearGradient id="g2" x1="16" y1="4" x2="28" y2="38"><stop stop-color="#44ccff"/><stop offset=".5" stop-color="#aaeeff"/><stop offset="1" stop-color="#44ccff"/></linearGradient></defs></svg>
    </div>
    <div>
      <div class="logo-text">RAZOR GAMING DEV</div>
      <div class="logo-sub">Jasa Pembuatan Web Slot</div>
    </div>
  </a>

  <!-- Desktop Menu -->
  <nav class="menu">
    <a href="#">Home</a>
    <a href="#produk">Produk</a>
    <a href="https://wa.me/447544506270" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    <a href="https://t.me/razorgamingwebdev" target="_blank" class="menu-hi"><i class="fab fa-telegram-plane"></i> Telegram</a>
  </nav>

  <!-- Hamburger Button -->
  <button class="hamburger" id="hamburger" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</header>

<!-- Mobile Menu — ada tombol X sendiri -->
<div class="mob-menu" id="mobMenu">
  <button class="mob-close" id="mobClose" aria-label="Tutup menu">
    <i class="fas fa-times"></i>
  </button>
  <a href="#" class="mob-link">Home</a>
  <a href="#produk" class="mob-link">Produk</a>
  <a href="https://wa.me/447544506270" target="_blank" class="mob-link"><i class="fab fa-whatsapp"></i> WhatsApp</a>
  <a href="https://t.me/razorgamingwebdev" target="_blank" class="mob-link"><i class="fab fa-telegram-plane"></i> Telegram</a>
</div>

<!-- BANNER -->
<section class="banner-section">
  <div class="shim-line"></div>
  <div class="banner-wrap">
    <div class="banner" id="bannerEl">
      <div class="slides-box">
        <div class="slides" id="slides">
          <div class="slide"><img src="https://dash.takenupload.org/6a0464b076eb3" alt="Banner 1"></div>
          <div class="slide"><img src="https://dash.takenupload.org/69fad48a3f8c6" alt="Banner 2"></div>
          <div class="slide"><img src="https://dash.takenupload.org/6a0464c162d39" alt="Banner 3"></div>
        </div>
      </div>
      <div class="b-text">
        <h2><span>RAZOR GAMING DEV</span></h2>
        <p>Jasa Pembuatan Web Slot & Gambling Terbaik</p>
      </div>
      <div class="b-counter"><span class="cur" id="cntCur">01</span> / 03</div>
      <button class="b-arr l" id="arrL" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>
      <button class="b-arr r" id="arrR" aria-label="Next"><i class="fas fa-chevron-right"></i></button>
      <div class="b-dots" id="bDots">
        <span class="on" data-i="0"></span>
        <span data-i="1"></span>
        <span data-i="2"></span>
      </div>
      <div class="b-corn tl"></div><div class="b-corn tr"></div>
      <div class="b-corn bl"></div><div class="b-corn br"></div>
    </div>
  </div>
  <div class="shim-line"></div>
</section>

<!-- KONTEN -->
<main class="container" id="produk">
  <div class="sec-title">
    <div class="bar"></div>
    <h2>Katalog Produk</h2>
    <span class="cnt">25 Items</span>
  </div>
  <div class="grid">

    <div class="card"><div class="card-img"><span class="card-badge">NEW</span><img src="produk/25.jpg" alt="TAMPILAN MPO A1"></div><div class="info"><h3>25. TAMPILAN MPO A1</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 25.+TAMPILAN+MPO+A1"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/25.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><span class="card-badge">NEW</span><img src="produk/24.jpg" alt="TAMPILAN ONIX F1"></div><div class="info"><h3>24. TAMPILAN ONIX F1</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 24.+TAMPILAN+ONIX+F1"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/24.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/23.jpg" alt="TAMPILAN IDN V5"></div><div class="info"><h3>23. TAMPILAN IDN V5</h3><div class="price">Rp 900,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 23.+TAMPILAN+IDN+V5"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/23.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/22.jpg" alt="TAMPILAN MPO A3"></div><div class="info"><h3>22. TAMPILAN MPO A3</h3><div class="price">Rp 650,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 22.+TAMPILAN+MPO+A3"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/22.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/21.jpg" alt="TAMPILAN MPO A2"></div><div class="info"><h3>21. TAMPILAN MPO A2</h3><div class="price">Rp 650,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 21.+TAMPILAN+MPO+A2"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/21.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/20.jpg" alt="TAMPILAN IDN V4"></div><div class="info"><h3>20. TAMPILAN IDN V4</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 20.+TAMPILAN+IDN+V4"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/20.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><span class="card-badge">HOT</span><img src="produk/19.jpg" alt="TAMPILAN IDN NEW PREMIUM"></div><div class="info"><h3>19. TAMPILAN IDN NEW PREMIUM</h3><div class="price">Rp 1,200,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 19.+TAMPILAN+IDN+NEW+PREMIUM"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/19.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><span class="card-badge">PREMIUM</span><img src="produk/18.jpg" alt="TAMPILAN NEW"></div><div class="info"><h3>18. TAMPILAN NEW</h3><div class="price">Rp 1,500,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 18.+TAMPILAN+NEW"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/18.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/17.jpg" alt="TAMPILAN IDN V7"></div><div class="info"><h3>17. TAMPILAN IDN V7</h3><div class="price">Rp 800,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 17.+TAMPILAN+IDN+V7"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/17.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/16.jpg" alt="TAMPILAN IDN V1"></div><div class="info"><h3>16. TAMPILAN IDN V1</h3><div class="price">Rp 650,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 16.+TAMPILAN+IDN+V1"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/16.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/15.jpg" alt="TAMPILAN MPO A1"></div><div class="info"><h3>15. TAMPILAN MPO A1</h3><div class="price">Rp 600,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 15.+TAMPILAN+MPO+A1"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/15.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/14.jpg" alt="TAMPILAN IDN V6 NEW"></div><div class="info"><h3>14. TAMPILAN IDN V6 NEW</h3><div class="price">Rp 800,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 14.+TAMPILAN+IDN+V6+NEW"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/14.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/13.jpg" alt="TAMPILAN ONIC V1"></div><div class="info"><h3>13. TAMPILAN ONIC V1</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 13.+TAMPILAN+ONIC+V1"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/13.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/12.jpg" alt="TAMPILAN NEXUSS"></div><div class="info"><h3>12. TAMPILAN NEXUSS</h3><div class="price">Rp 650,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 12.+TAMPILAN+NEXUSS"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/12.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/11.jpg" alt="TAMPILAN ONIC NEW 6 WARNA"></div><div class="info"><h3>11. TAMPILAN ONIC NEW 6 WARNA</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 11.+TAMPILAN+ONIC+NEW+6+WARNA"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/11.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/10.jpg" alt="TAMPILAN NEW NEXUS"></div><div class="info"><h3>10. TAMPILAN NEW NEXUS</h3><div class="price">Rp 1,000,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 10.+TAMPILAN+NEW+NEXUS"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/10.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/9.jpg" alt="TAMPILAN NEW IDN 100 WARNA PREMIUM UNGU"></div><div class="info"><h3>09. TAMPILAN NEW IDN 100 WARNA PREMIUM UNGU</h3><div class="price">Rp 950,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 09.+TAMPILAN+NEW+IDN+100+WARNA+PREMIUM+UNGU"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/9.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/8.jpg" alt="TAMPILAN NUKE"></div><div class="info"><h3>08. TAMPILAN NUKE</h3><div class="price">Rp 650,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 08.+TAMPILAN+NUKE"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/8.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/7.jpg" alt="TAMPILAN OLD IDN GREEN"></div><div class="info"><h3>07. TAMPILAN OLD IDN GREEN</h3><div class="price">Rp 600,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 07.+TAMPILAN+OLD+IDN+GREEN"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/7.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/6.jpg" alt="TAMPILAN NEW IDN REED"></div><div class="info"><h3>06. TAMPILAN NEW IDN REED</h3><div class="price">Rp 600,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 06.+TAMPILAN+NEW+IDN+REED"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/6.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/5.jpg" alt="TAMPILAN NEW IDN BLUE"></div><div class="info"><h3>05. TAMPILAN NEW IDN BLUE</h3><div class="price">Rp 600,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 05.+TAMPILAN+NEW+IDN+BLUE"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/5.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/4.jpg" alt="TAMPILAN OLD IDN REED"></div><div class="info"><h3>04. TAMPILAN OLD IDN REED</h3><div class="price">Rp 600,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 04.+TAMPILAN+OLD+IDN+REED"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/4.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/3.jpg" alt="TAMPILAN ONIC LARAVEL"></div><div class="info"><h3>03. TAMPILAN ONIC LARAVEL</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 03.+TAMPILAN+ONIC+LARAVEL"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/3.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/2.jpg" alt="TAMPILAN IDN V5 100 WARNA PREMIUM GOLD"></div><div class="info"><h3>02. TAMPILAN IDN V5 100 WARNA PREMIUM GOLD</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 02.+TAMPILAN+IDN+V5+100+WARNA+PREMIUM+GOLD"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/2.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

    <div class="card"><div class="card-img"><img src="produk/1.jpg" alt="TAMPILAN OLD ONIC"></div><div class="info"><h3>01. TAMPILAN OLD ONIC</h3><div class="price">Rp 700,000</div><div class="btn-row"><a class="btn btn-buy" href="https://wa.me/447544506270?text=Saya mau beli 01.+TAMPILAN+OLD+ONIC"><i class="fab fa-whatsapp"></i> Beli</a><a class="btn btn-view" href="javascript:void(0)" onclick="lihatGambar('produk/1.jpg')"><i class="fas fa-eye"></i> Lihat</a></div></div></div>

  </div>
</main>

<!-- FOOTER -->
<footer class="footer">
  <div class="footer-logo">RAZOR GAMING DEV</div>
  <div class="footer-text">Jasa Pembuatan Web Slot & Gambling Terbaik</div>
  <div class="footer-socials">
    <a href="https://wa.me/447544506270" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
    <a href="https://t.me/razorgamingwebdev" target="_blank" aria-label="Telegram"><i class="fab fa-telegram-plane"></i></a>
  </div>
  <div class="footer-text" style="margin-top:16px;font-size:12px;opacity:.5">&copy; 2025 Razor Gaming Dev. All rights reserved.</div>
</footer>

<!-- POPUP -->
<div id="popupImg">
  <img id="showImg" src="" alt="Preview">
  <button class="close-btn" onclick="tutupGambar()"><i class="fas fa-times"></i> Tutup</button>
</div>

<script>
/* ===== POPUP GAMBAR ===== */
function lihatGambar(s){
  document.getElementById('showImg').src = s;
  document.getElementById('popupImg').classList.add('active');
  document.body.style.overflow = 'hidden';
}
function tutupGambar(){
  document.getElementById('popupImg').classList.remove('active');
  document.body.style.overflow = '';
}
document.getElementById('popupImg').addEventListener('click', function(e){
  if(e.target === this) tutupGambar();
});
document.addEventListener('keydown', function(e){
  if(e.key === 'Escape'){ tutupGambar(); closeMob(); }
});

/* ===== BANNER SLIDER ===== */
var si = 0, total = 3;
var sl = document.getElementById('slides');
var dots = document.querySelectorAll('#bDots span');
var cntEl = document.getElementById('cntCur');
var autoTimer;

function updSlide(){
  sl.style.transform = 'translateX(-' + (si * 100) + '%)';
  for(var i = 0; i < dots.length; i++){
    if(i === si) dots[i].classList.add('on');
    else dots[i].classList.remove('on');
  }
  cntEl.textContent = String(si + 1).padStart(2, '0');
}

function nxtSlide(){ si = (si + 1) % total; updSlide(); }

function chSlide(d){
  si = (si + d + total) % total;
  updSlide();
  resetAuto();
}

function goSlide(i){
  si = i;
  updSlide();
  resetAuto();
}

function resetAuto(){
  clearInterval(autoTimer);
  autoTimer = setInterval(nxtSlide, 4500);
}

autoTimer = setInterval(nxtSlide, 4500);

/* Arrow pakai addEventListener — pasti kebaca */
document.getElementById('arrL').addEventListener('click', function(){ chSlide(-1); });
document.getElementById('arrR').addEventListener('click', function(){ chSlide(1); });

/* Dots pakai event delegation */
document.getElementById('bDots').addEventListener('click', function(e){
  if(e.target.tagName === 'SPAN'){
    var idx = parseInt(e.target.getAttribute('data-i'));
    if(!isNaN(idx)) goSlide(idx);
  }
});

/* Touch swipe */
var tx = 0;
var bannerEl = document.getElementById('bannerEl');
bannerEl.addEventListener('touchstart', function(e){
  tx = e.changedTouches[0].screenX;
}, {passive: true});
bannerEl.addEventListener('touchend', function(e){
  var d = tx - e.changedTouches[0].screenX;
  if(Math.abs(d) > 50) chSlide(d > 0 ? 1 : -1);
}, {passive: true});

/* Pause auto saat hover */
bannerEl.addEventListener('mouseenter', function(){ clearInterval(autoTimer); });
bannerEl.addEventListener('mouseleave', function(){ autoTimer = setInterval(nxtSlide, 4500); });

/* ===== HAMBURGER MENU ===== */
var hamburger = document.getElementById('hamburger');
var mobMenu = document.getElementById('mobMenu');
var mobClose = document.getElementById('mobClose');

/* Buka menu */
hamburger.addEventListener('click', function(){
  mobMenu.classList.add('active');
  hamburger.classList.add('active');
  document.body.style.overflow = 'hidden';
});

/* Tombol X close — ini yang tadi bug */
mobClose.addEventListener('click', function(){
  closeMob();
});

/* Klik link di mobile menu — tutup menu */
var mobLinks = document.querySelectorAll('.mob-link');
for(var i = 0; i < mobLinks.length; i++){
  mobLinks[i].addEventListener('click', function(){
    closeMob();
  });
}

/* Klik area kosong di mobile menu — tutup */
mobMenu.addEventListener('click', function(e){
  if(e.target === mobMenu) closeMob();
});

function closeMob(){
  mobMenu.classList.remove('active');
  hamburger.classList.remove('active');
  document.body.style.overflow = '';
}

/* ===== HEADER SCROLL ===== */
var headerEl = document.getElementById('header');
window.addEventListener('scroll', function(){
  if(window.scrollY > 30) headerEl.classList.add('scrolled');
  else headerEl.classList.remove('scrolled');
}, {passive: true});

/* ===== PARTICLES ===== */
(function(){
  var c = document.getElementById('particles');
  var n = window.innerWidth < 768 ? 12 : 30;
  for(var i = 0; i < n; i++){
    var p = document.createElement('div');
    p.className = 'particle';
    var s = Math.random() * 2 + 1;
    p.style.width = s + 'px';
    p.style.height = s + 'px';
    p.style.left = Math.random() * 100 + '%';
    p.style.animationDuration = (Math.random() * 12 + 8) + 's';
    p.style.animationDelay = (Math.random() * 10) + 's';
    p.style.background = Math.random() > 0.5 ? '#00aaff' : '#00d4ff';
    c.appendChild(p);
  }
})();

/* ===== SCROLL REVEAL ===== */
var obs = new IntersectionObserver(function(entries){
  entries.forEach(function(e){
    if(e.isIntersecting){
      e.target.style.animationPlayState = 'running';
      obs.unobserve(e.target);
    }
  });
}, {threshold: 0.1, rootMargin: '50px'});

var cards = document.querySelectorAll('.card');
for(var i = 0; i < cards.length; i++){
  cards[i].style.animationPlayState = 'paused';
  obs.observe(cards[i]);
}
</script>
</body>
</html>
