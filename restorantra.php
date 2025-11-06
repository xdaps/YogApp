<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>YogApp - Yogyakarta Istimewa</title>
  <meta name="description" content="Cari Restoran Tradisional di Yogyakarta dengan filter bintang, fasilitas, dan area." />
  <style>
    :root{
      --bg:#f7fafc; --card:#ffffff; --ink:#0f172a; --muted:#475569;
      --brand:#22c55e; --brand-2:#06b6d4; --bd:#e2e8f0; --chip:#eef2ff;
      --warn:#f59e0b; --ok:#16a34a; --shadow:0 10px 30px rgba(15,23,42,.08);
      --radius:18px;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{margin:0;font-family:ui-sans-serif,-apple-system,Segoe UI,Roboto,Arial; background:var(--bg); color:var(--ink); line-height:1.5;}
    .wrap{max-width:1200px;margin:auto;padding:16px}
    header.top{position:sticky;top:0;z-index:50;background:linear-gradient(180deg,#fff,rgba(255,255,255,.92));border-bottom:1px solid var(--bd);backdrop-filter:blur(6px)}
    .top__inner{display:flex;align-items:center;gap:12px;padding:10px 0}
    .brand{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
    .brand img{height:60px;width:auto;display:block;  
      display: block;               /* biar bisa kasih margin */
      max-width: 100%;/* biar responsif */
      /*border: 0.01px solid #7fce9c8e;    /* border warna hijau */
      border-radius: 16px;          /* sudut melengkung */
      margin: 20px auto;            /* jarak dari tepi layar, auto = center */
     /* outline: 0.1px solid rgb(87, 227, 117); /* garis luar biru */}
    .searchbar{flex:1;display:flex;gap:8px}
    .field{position:relative;flex:1}
    input[type="search"]{width:100%;padding:12px 40px 12px 14px;border-radius:999px;border:1px solid var(--bd);outline:none;background:#fff;box-shadow:var(--shadow)}
    .clear{position:absolute;right:10px;top:50%;translate:0 -50%;border:0;background:#0000;cursor:pointer;font-size:18px;color:#64748b}
    .btn{appearance:none;border:1px solid var(--bd);background:#fff;color:var(--ink);padding:10px 14px;border-radius:12px;cursor:pointer;text-decoration:none;display:inline-flex;align-items:center;justify-content:center}
    .btn.brand{border-color:transparent;background:linear-gradient(135deg,var(--brand),var(--brand-2));color:#fff;font-weight:700}
    .btn.ghost{background:#fff;border-color:var(--bd)}
    .controls{display:grid;gap:10px;grid-template-columns:repeat(12,1fr);align-items:end;padding:12px 0 4px}
    .ctrl{display:flex;flex-direction:column;gap:6px}
    label{font-size:.82rem;color:var(--muted)}
    select{width:100%;border:1px solid var(--bd);padding:10px 12px;border-radius:12px;background:#fff}
    .amenities{display:flex;flex-wrap:wrap;gap:8px}
    .chip{display:inline-flex;align-items:center;gap:6px;padding:8px 12px;border-radius:999px;background:#fff;border:1px solid var(--bd);cursor:pointer;user-select:none}
    .chip input{display:none}
    .chip.active{background:var(--chip);border-color:#c7d2fe}
    .subtle{color:var(--muted);font-size:.9rem}
    .resultbar{display:flex;align-items:center;justify-content:space-between;padding:10px 0}
    .grid{display:grid;gap:14px;grid-template-columns:repeat(12,1fr)}
    .card{grid-column:span 4;background:var(--card);border:1px solid var(--bd);border-radius:var(--radius);overflow:hidden;box-shadow:var(--shadow);display:flex;flex-direction:column}
    .media{height:160px;background:#dfe7ef;position:relative}
    .badge{position:absolute;left:10px;top:10px;background:#0f172a;color:#fff;padding:6px 10px;border-radius:999px;font-size:.8rem;opacity:.9}
    .content{padding:12px 14px;display:flex;flex-direction:column;gap:8px;flex:1}
    .title{display:flex;align-items:center;justify-content:space-between;gap:8px}
    .title h3{margin:0;font-size:1.05rem}
    .stars{display:flex;gap:2px;font-size:14px;color:#f59e0b}
    .meta{display:flex;gap:10px;flex-wrap:wrap;font-size:.9rem;color:var(--muted)}
    .tags{display:flex;flex-wrap:wrap;gap:6px}
    .tag{font-size:.8rem;padding:4px 8px;border-radius:999px;background:#f1f5f9;color:#0f172a;border:1px solid #e2e8f0}
    .actions{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-top:1px dashed var(--bd);gap:10px}
    .actions .btn{flex:1}
    .empty{border:1px dashed var(--bd);padding:30px;border-radius:14px;background:#fff;text-align:center}
    footer{padding:40px 0 60px;color:var(--muted);text-align:center}
    details.tip{background:#fff;border:1px solid var(--bd);padding:12px 14px;border-radius:12px}
    details.tip summary{cursor:pointer;font-weight:600}
    @media (max-width:1100px){.card{grid-column:span 6}}
    @media (max-width:700px){.top__inner{flex-wrap:wrap}.controls{grid-template-columns:repeat(6,1fr)}.card{grid-column:span 12}.actions{flex-direction:column}}
    dialog.modal{border:0;border-radius:16px;width:min(720px,92vw);padding:0;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.25)}
    dialog::backdrop{background:rgba(2,6,23,.55);backdrop-filter:blur(3px)}
    .modal__head{padding:14px 16px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid var(--bd);background:#fff}
    .modal__body{padding:16px;background:#fff}
    .kicker{font-size:.8rem;color:var(--muted)}
    .pill{display:inline-flex;align-items:center;gap:6px;padding:6px 10px;border-radius:999px;background:#f1f5f9;border:1px solid #e2e8f0}
    .rating{display:inline-flex;gap:6px;align-items:center}
  </style>
</head>
<body>
  <header class="top">
    <div class="wrap top__inner">
      <!-- GANTI TEKS MENJADI LOGO -->
      <a href="#" class="brand" aria-label="Restoran">
<a href="pilihan.html">
  <img src="logo1.png" alt="Logo BPJS" width="120" style="cursor:pointer;">
</a>
      </a>
      <div class="searchbar">
        <div class="field">
          <input id="q" type="search" placeholder="Cari nama restoran atau area… (mis. Malioboro, Gudeg)" autocomplete="off" />
          <button class="clear" title="Bersihkan" aria-label="Bersihkan" onclick="q.value=''; q.dispatchEvent(new Event('input'));">×</button>
        </div>
      </div>
    </div>
  </header>

  <main class="wrap">
    <section class="controls" aria-label="Filter">
      <div class="ctrl" style="grid-column: span 4;">
        <label for="area">Area</label>
        <select id="area">
          <option value="">Semua area</option>
        </select>
      </div>
      <div class="ctrl" style="grid-column: span 4;">
        <label for="sort">Urutkan</label>
        <select id="sort">
          <option value="pop-desc">Paling populer</option>
          <option value="rating-desc">Rating tertinggi</option>
          <option value="stars-desc">Bintang tertinggi</option>
          <option value="name-asc">Nama (A–Z)</option>
        </select>
      </div>
      <div class="ctrl" style="grid-column: span 4;">
        <label for="minStars">Minimal bintang</label>
        <select id="minStars">
          <option value="0">Semua</option>
          <option value="5">★★★★★</option>
          <option value="4">★★★★</option>
          <option value="3">★★★</option>
          <option value="2">★★</option>
          <option value="1">★</option>
        </select>
      </div>
      <div class="ctrl" style="grid-column: span 12;">
        <div class="amenities" id="amenities"></div>
      </div>
    </section>

    <section class="resultbar">
      <div><strong id="count">0</strong> restoran ditemukan <span class="subtle" id="activeFilters"></span></div>
    </section>

    <section id="grid" class="grid" aria-live="polite" aria-busy="false"></section>

    
    <footer>
      <div>©️ <span id="year"></span> BPJS Ketenagakerjaan Yogyakarta </div>
    </footer>
  </main>

  <dialog class="modal" id="modal">
    <div class="modal__head">
      <div style="display:flex;flex-direction:column">
        <span class="kicker">Detail restoran</span>
        <strong id="m_name"></strong>
      </div>
      <button class="btn" onclick="modal.close()">Tutup</button>
    </div>
    <div class="modal__body" id="m_body"></div>
  </dialog>

<script>
// =========================================================================
// 1. DATA RESTORAN TRADISIONAL (Wajib ada di dalam script)
// =========================================================================
const DATA_TRADISIONAL = [
{n:"Bakmi Jowo Mbah Gito", area:"DALAM KOTA", rate:4.3, tags:["tradisional"], pop:15815, cp:"085228408800", img:"https://www.dejogja.co.id/wp-content/uploads/2024/01/8.-Bak-Mie-Jowo-Mbah-Gito.jpg"},
{n:"Lokanusa Kotagede", area:"DALAM KOTA", rate:4.8, tags:["tradisional"], pop:307, cp:"085190078856", img:"https://i0.wp.com/jogjakarya.id/wp-content/uploads/2025/04/Lokanusa-Kotagede-Menyeruput-Teh-Menyelami-Budaya-di-Tengah-Heritage-Jogja.jpg?fit=900%2C600&ssl=1"},
{n:"Raos Djogja Restaurant", area:"DALAM KOTA", rate:4.3, tags:["tradisional"], pop:1471, cp:"02744290501", img:"https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/535428f2-3e0d-41e2-b057-d63afbc94d8d_Go-Biz_20210714_165252.jpeg"},
{n:"Bakmi Gandhok Kadipaten", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:1690, cp:"085330185328", img:"https://tse1.mm.bing.net/th/id/OIP.wWVFBU68L2t5XI5EHUR-mgHaEK?pid=Api&P=0&h=180"},
{n:"Bakmi & Bajigur Kadin Mbah Hj. Karto Pak Rochadi", area:"DALAM KOTA", rate:4.0, tags:["tradisional"], pop:7887, cp:"087838332929", img:"https://tse2.mm.bing.net/th/id/OIP.ri4ZXC3eM_PZvUF8ER7S0AHaHa?pid=Api&P=0&h=180"},
{n:"Warung Bu Komang", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:2899, cp:"081227567891", img:"https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/c1f3ca57-81b1-4c32-ba0d-accd20829a1c.jpg"},
{n:"Bakmi MasJoyo KOTAGEDE", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:1138, cp:"081327421134", img:"https://lh3.googleusercontent.com/p/AF1QipOr0hH89Z-vJvEQyYvqv2xmD4q_EUNYTYpUKj-L=s1360-w1360-h1020"},
{n:"NASGOR LEGENDA", area:"DALAM KOTA", rate:4.8, tags:["tradisional"], pop:1931, cp:"082226662882", img:"https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/3d11131e-8fa6-42c5-a647-2b13fa0978e1_274443_646e1f81_Nasi_Goreng_Legenda_Ayam_Kampung.png"},
{n:"Bakso Pajero Colombo", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:4752, cp:"0882006337396", img:"https://i0.wp.com/i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/6c847780-f202-477f-8307-5fdd2e8b7b73_brand-image_1629722496630.jpg"},
{n:"Kopi Kampung Ambarukmo (Kokambar)", area:"DALAM KOTA", rate:4.6, tags:["tradisional"], pop:3955, cp:"081215819525", img:"https://tse3.mm.bing.net/th/id/OIP.DZ6q_82otDktPDXijbPF-gHaFj?pid=Api&P=0&h=180"},
{n:"The House Of Raminten", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:20441, cp:"0274547315", img:"https://homestaydijogja.net/wp-content/uploads/2023/09/The-House-of-Raminten-5.jpg"},
{n:"Raminten's Kitchen", area:"DALAM KOTA", rate:4.3, tags:["tradisional"], pop:11963, cp:"087738884008", img:"https://tse3.mm.bing.net/th/id/OIP.Y-eGpr3hfNdG5xxSyvPsgQHaE8?pid=Api&P=0&h=180"},
{n:"Bubur Hayam Kotabaru", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:6908, cp:"089674776888", img:"https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/76747ae0-0aec-4c6e-97df-2fe6cfb85781_21b9171e-1d62-48cf-b5a2-ffe88cd190e9_Go-Biz_20200202_112043.jpeg"},
{n:"Gudeg Sagan", area:"DALAM KOTA", rate:4.6, tags:["tradisional"], pop:8807, cp:"085100443035", img:"https://assets-pergikuliner.com/PGlEcWADe-mJ1NIFG0hMq5_CsfE=/385x290/smart/https://assets-pergikuliner.com/uploads/image/picture/1450625/picture-1560913899.jpg"},
{n:"Pendopo Lawas", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:12467, cp:"0816904572", img:"https://tse4.mm.bing.net/th/id/OIP.ZTF2liRsLn8J-zFJeAH4MQHaFS?pid=Api&P=0&h=180"},
{n:"Yammie Pathuk Kemetiran Kidul Yogyakarta", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:5891, cp:"082292292112", img:"https://tse2.mm.bing.net/th/id/OIP.mHU8WwDzmsCjONB-lcM0QgAAAA?pid=Api&P=0&h=180"},
{n:"Mie Sapi Gajahan", area:"DALAM KOTA", rate:4.2, tags:["tradisional"], pop:1410, cp:"-", img:"https://i.pinimg.com/736x/f8/6d/07/f86d070fc8f1369ccdcd8340408ab472.jpg"},
{n:"Mie Doyok Gejayan", area:"DALAM KOTA", rate:4.3, tags:["tradisional"], pop:916, cp:"- ", img:"https://assets.kompasiana.com/items/album/2023/06/22/32e19b67-1263-4f2f-9404-414e9f5a12be-6493e62d4addee1a0449ae22.jpeg?t=o&v=350"},
{n:"Gudeg Yu Djum Pusat", area:"DALAM KOTA", rate:4.6, tags:["tradisional"], pop:6114, cp:"0274515968", img:"https://visitingjogja.jogjaprov.go.id/wp-content/uploads/2017/01/gudeg-yu-djum-2.jpg"},
{n:"SGPC Bu Wiryo 1959", area:"DALAM KOTA", rate:4.3, tags:["tradisional"], pop:5233, cp:"0274512288", img:"https://nagantour.com/wp-content/smush-webp/2018/04/sgpc-bu-wiryo-1959-scaled.jpg.webp"},
{n:"Bale Timoho Resto", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:4819, cp:"0274563685", img:"https://visitingjogja.jogjaprov.go.id/wp-content/uploads/2022/11/278733563_400796691556742_150785262596007471_n.jpg"},
{n:"Sawah Resto Nologaten", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:3296, cp:"081226817789", img:"https://www.ascomaxx.com/uploads/large/0eddd802fbba1852fd45e6e0f0884c64.png"},
{n:"Taru Martani Coffee & Resto 1918", area:"DALAM KOTA", rate:4.6, tags:["tradisional"], pop:5894, cp:"081336483124", img:"https://tse2.mm.bing.net/th/id/OIP.5rGnjMovdHMg7m3QbNctqwHaE8?pid=Api&P=0&h=180"},
{n:"Bakmi Jawa Pak Pele", area:"DALAM KOTA", rate:4.2, tags:["tradisional"], pop:4740, cp:"-", img:"https://tse4.mm.bing.net/th/id/OIP.IfrUfGlDPzQfCSvpxvLElAHaEK?pid=Api&P=0&h=180"},
  {n:"WARUNG SOTO KADIPIRO", area:"DALAM KOTA", rate:4.5, tags:["tradisional"], pop:6967, cp:"081328785271", img:"https://assets.promediateknologi.id/crop/0x0:0x0/0x0/webp/photo/krjogja/news/2023/04/21/502566/soto-kadipiro-jujugan-wisatawan-usia-hampir-seabad-lezatnya-masih-sama-230421x.jpg"},
  {n:"Coto \"La-Capila\"", area:"DALAM KOTA", rate:4.6, tags:["tradisional"], pop:2662, cp:"081392926531", img:"https://nagantour.com/wp-content/uploads/2023/08/coto-makasar.webp"},
  {n:"Bopet Bagindo Pakuningratan", area:"DALAM KOTA", rate:4.1, tags:["tradisional"], pop:247, cp:"085163539788", img:"https://tse3.mm.bing.net/th/id/OIP.unr_D9xWoCO6ack3paH1JQHaEn?pid=Api&P=0&h=180"},
  {n:"Ayam Rempah Kranggan", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:44, cp:"085189349074", img:"https://lh3.googleusercontent.com/p/AF1QipPqEhEf9a3gmLExabdRkkmBIZuI8DZUgxzy4hOK=s1360-w1360-h1020"},
  {n:"Keumala", area:"DALAM KOTA", rate:5.0, tags:["tradisional"], pop:2, cp:"-", img:"https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e905dcfb-770d-412b-86f7-f00c9f2bcf3d_Go-Biz_20241012_172641.jpeg?auto=format"},
  {n:"Dapur Mamaks Soragan", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:126, cp:"082344000194", img:"https://tse2.mm.bing.net/th/id/OIP.IVc4dXD5uKsfkp_Cfy8r-AHaFj?pid=Api&P=0&h=180"},
  {n:"Gendhis Jawi", area:"DALAM KOTA", rate:4.4, tags:["tradisional"], pop:603, cp:"082223237997", img:"https://tse3.mm.bing.net/th/id/OIP.o4qUmEIGcnLu99lzBBRjIwHaFj?pid=Api&P=0&h=180"},
  
  {n:"Tjondrogeni Resto", area:"UTARA", rate:4.7, tags:["tradisional"], pop:122, cp:"081216474267", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrFx141pu8q5J9VfowegOdVQU4XRJcB0xZzXXVCJk1dWiV-kDj4HKaAZwuGMf3qKJnQP0uaaGN7cLI7cpOarKK_zcz8w9m10Qi_Nlk9DMEm1ZAEgRDA0D-sn-4HWwKubP9r_QA=s1360-w1360-h1020"},
  {n:"The Harjo's Java Resto", area:"UTARA", rate:4.7, tags:["tradisional"], pop:468, cp:"081390413081", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noDBca__GIxSghcrRsV_QzqVWbRimykl5mpap1GQLnKEOZ723zat-pmQZcvoUr8tFBnCzTPEGwxmX65Rs680B5GZ7qRLaJZ_HaFTXYAFQ1M3G4diePN5uNNXG23dEvW0I4UIfhP=s1360-w1360-h1020"},
  {n:"Rajinem Kopi & Thiwul", area:"UTARA", rate:4.7, tags:["tradisional"], pop:174, cp:"08122993883", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrTUcE2fOnYuIPWGth6dGNBN_VfTF_qf0QGIABuU_p_0KdxgMIe6M84ioe7YX11terPYK-GLX_3qzw67UTY2WlmFMvcGZLBuCD6juAS9DLgU0RFhd7jiTxNLU7znXfFwQMhcKY5gg=s1360-w1360-h1020"},
  {n:"WARUNG SOP DAN SATE SAPI PAK BAYU", area:"UTARA", rate:4.8, tags:["tradisional"], pop:25609, cp:"082211116600", img:"https://www.magnetoholidays.id/wp-content/uploads/2022/08/bayuu.jpg"},
  {n:"The Waroeng of Raminten", area:"UTARA", rate:4.5, tags:["tradisional"], pop:11671, cp:"081334560070", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqeOqGI2sLQmjejh9oLVeaKy3FMx1Wcih_aEg7Z7uxp0Su2e_LIj0hcINcy-e3Uhpz1lIeAHsIAnB1PzYwKAtbhN0p8oEGafdzTe9N8eUIFRIFjmXamwqnzfLzX5-zcCAivS07A=s1360-w1360-h1020"},
  {n:"Waroeng Kopi Klotok", area:"UTARA", rate:4.5, tags:["tradisional"], pop:38088, cp:"082231312004", img:"https://www.dejogjaadventure.com/wp-content/uploads/2020/01/KOPI-KLOTOK-JOGJA-3.jpg"},
  {n:"WARUNG GASOTANG Iga Bakar dan Soto Tangkar", area:"UTARA", rate:4.8, tags:["tradisional"], pop:2348, cp:"082172001500", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4no0QyynLmxHWDCWj-AkEvsSHCGCfQbBiB3rsyY7YW7pLiecvsGxQDc6A-S2EnhN5r2Nibywi456UovWHi0OKgqttbhbJ2uaMlGraD2Ky1YiqKboBXxHc-Ci3F6FlfXrc3SOxgpFrHhu_i03=s1360-w1360-h1020"},
  {n:"Gubug Makan Mang Engking Pusat", area:"UTARA", rate:4.6, tags:["tradisional"], pop:6345, cp:"085100489732", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrBbeyEMgfYiDHtDHIVyE5aypnm4W1rpyum2aggWW3PyVvfjAjtf-i91Fx8CFIGAevgpvhiGusMpj017H_mPysKKHxlsen9RafUP2Q_WZCkkBiSLGR9ANzXSWxEoElWpoWX8BDZVri5ERBB=s1360-w1360-h1020"},
  {n:"Pawon Mbah Gito", area:"UTARA", rate:4.6, tags:["tradisional"], pop:3573, cp:"082134897557", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqA3qdaFGpvdoiO0LzpbYLNoewrzzWK845NMFkRHTFVsOc8cSgL79-SsPSJhVGUB2Xbo3FONcRRW0laS-J1KZs47gjy51U9vWnEgYO3hb5N4EoJCOGIV7ZWdAAFOFu6DXMB_BV3Og=s1360-w1360-h1020"},
  {n:"Erista Garden - Erista Griyo Dhahar", area:"UTARA", rate:4.6, tags:["tradisional"], pop:4366, cp:"081251310434", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqxExbI7M4u-h2XGdkgiSAOsp8q2mSSVCYYD0QrQhL3BR79WBCyMUKqs7zl8G8COvt8cHsBglg9rrQeQ_fHRmt5X3BySZt5FFMSecMOGxGGkhxGcuYyyfk8OJtHDfouBXvmMMNXE5w9T_dw=s1360-w1360-h1020"},
  {n:"Tengkleng Gajah", area:"UTARA", rate:4.4, tags:["tradisional"], pop:23363, cp:"081227686809", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrrBICTCJjuAfoLSunaARvNwbIA_EuAPh5WtxFMGQPpZ0if9tRCC9dCR6Y2R7wZv1GwlS6HgN7pBf_Q6mmYSBVuQ907ifKG7exCOSKDUaIgwoNcTkjWmEj8mqA2sruqPao5yNkYCDqCgBg=s1360-w1360-h1020"},
  {n:"Sate Ratu", area:"UTARA", rate:4.6, tags:["tradisional"], pop:10637, cp:"0817556666", img:"https://lh3.googleusercontent.com/p/AF1QipMK4WScFZjrgiqcw0dTZoWIetNnNVmG0Q6tWhIq=s1360-w1360-h1020"},
  {n:"Ayam Pedas Artomoro", area:"UTARA", rate:4.5, tags:["tradisional"], pop:4729, cp:"085104460855", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noMNT9gLwSP-yhavvu7wnupdRke_GFv-UYLhrZGwgkMVcYxH-DnygNXbsGNGlR67FZkBLg8ZoWWyhKmvimqquE9Kh1WnoJ3_yRFUhJt5JzLGmwjXtIKVX1WYnLU9opstPOaUTeD=s1360-w1360-h1020"},
  {n:"Ndalem Klangenan", area:"UTARA", rate:4.1, tags:["tradisional"], pop:251, cp:"082230908443", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4no-ba1u06KLEjCA8hPvKGVHM3apNrdkznUCCgcmrWVUi2XlMCkP77IHS7z5Sezv9huvNucqXMU11th3-ZNcwT2fmfyG6qOVICHJcmkc42n1p-hXG4j2hiI08vLPzZ4OsS9hviw0NM7U3YKn=s1360-w1360-h1020"},
  {n:"Iga BAJOG (Iga Bakar Jogja)", area:"UTARA", rate:4.3, tags:["tradisional"], pop:6594, cp:"082134019090", img:"https://visitingjogja.jogjaprov.go.id/wp-content/uploads/2022/07/igabajogasli-by-@igabajogasli.jpg"},
  {n:"Angkringan Anggajaya", area:"UTARA", rate:4.5, tags:["tradisional"], pop:2890, cp:"081226081696/ 082241394374", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npuG090KBO5OXm_F6s-8-G8OXRjxNoy9aajQJnzSc1Oyhyuggv7kpz-uWIwvcalpUPqoDC8VPnhJMlfgaFYfUPCCGgfYQJUpUdn4_LEyycgeBkvCiyHx4TbBS1dpZflwRXIGGy6OchizD4=s1360-w1360-h1020"},
  {n:"Moelih nDeso", area:"UTARA", rate:4.2, tags:["tradisional"], pop:2046, cp:"082137999988", img:"https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/3a/2e/74/waroeng-moelih-ndeso.jpg?w=500&h=-1&s=1"},
  {n:"Sate Kambing Mbah Giran", area:"UTARA", rate:4.2, tags:["tradisional"], pop:949, cp:"082223888827", img:"https://assets.telkomsel.com/public/2024-12/sate-kambing-mbah-so.png?VersionId=5HcmiP_bYm4YUX_Hy.xGlhbhDhWK97.H"},
  {n:"Vilakopi", area:"UTARA", rate:4.7, tags:["tradisional"], pop:264, cp:"081215256292", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npO20OB7igKDJSQligvsI1g2QJcDwVC9wLl2YxqUtNRv6915rcDWat7yyI1-otZruM5aSSJKy_wTJ6MxdOiPGr4WEIw-fp5L0Erb3j5M_14-ehHkF_TW7cx16StGcY-a6yGxbfEsv2PdnYR=s1360-w1360-h1020"},
  {n:"Gendhis 101 Masakan Jawa", area:"UTARA", rate:4.2, tags:["tradisional"], pop:622, cp:"087838161150", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nro4o8J3dekh0egianJh_ee0hPZ7NHvIaiIP5KSLEo9xiapcp3-vPchZzPeV8Jf_HxfNbBwqZbgFR4xeSJ16t3S9shh3QPnilaW4wojh7IFpMKwdIyWsKBnKMxIeOElwvmhP9vKq5f9CFQ=s1360-w1360-h1020"},
  {n:"Pesona Pingka Kopi & Resto", area:"UTARA", rate:4.0, tags:["tradisional"], pop:196, cp:"", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noVFXquU5ExxMHghSL8Yb4FVdCV88FyhokarBmuih2tOHwfecNfNnqArdEoB0lQhKQuCMz2pfc1kQMdT_KbVuqRxDVGBJXNLqXgGQzXL2PqNNnfE7kr8iRMVTzAI3S_ZPIVH2QW=s1360-w1360-h1020"},
  {n:"Warung Eyup", area:"UTARA", rate:4.6, tags:["tradisional"], pop:812, cp:"081322662013", img:"https://lh3.googleusercontent.com/p/AF1QipM2qBRm-_7krH10JWoiKEgA1flmsMQ3urlpKO1Z=s1360-w1360-h1020"},
  {n:"Pondok Merapi", area:"UTARA", rate:4.8, tags:["tradisional"], pop:609, cp:"087835060780", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrYS6Ummf_R1d3sFsPX3bq4z8_MmN30UDY4x9EnLU9ASBf7BlRSkdVssrUhCp3X_gSDf41IPyJ5_yJMdiSm8itZaIBHdLyI-sk-Yj_v6uo_oxx5C_z8ydPV3OA7lsZ7iWqP-nU=s1360-w1360-h1020"},
  {n:"Warung Kopi Merapi", area:"UTARA", rate:4.4, tags:["tradisional"], pop:8283, cp:"082145109003", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4no-vjgcUTyfgsqDl5kyREjanlab5Z_MhpTwDx8YLlnEmu4QcjEaaTIPJ-5HB21FH6sY467yv0z3LJZIF2A2te3g1-Af9d-frYzPKLe2mX3ZOTc3zMohFSTmkN84T1AR2Xh4QOg=s1360-w1360-h1020"},
  {n:"Warung Cangkruk", area:"UTARA", rate:4.8, tags:["tradisional"], pop:172, cp:"08111401900", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noqbqhBPHRloNDaFfwNJoNnzy0FjCjCtRp4zI1iZbftz_aJbzfXPDFnIzP1m0qVtmuCfsfE40Ox6VQJIp3Sc3ZZHAAMsc3ER1alQqT8j5QcuHKQ3ijFsmo1EPnuk-CWh0njDUx4ws-8ivSc=s1360-w1360-h1020"},
  {n:"The Allabun Resto & Garden", area:"UTARA", rate:4.6, tags:["tradisional"], pop:457, cp:"0813312109730", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noHPBmwKyH5R-pqCdHBTHef7ovwy87f4BExfBIBQPTS9xTXp9fOB0s3f18rA-2wDdk8zclVRAOf9fgwxEq8xJAL5LvCmr4ItOtUNxvjAfxq7PsT_U9wGR9Dd99v2nlfZ9Z3iFI=s1360-w1360-h1020"},
  {n:"Warung Makan dan Catering Mbah Ganis", area:"UTARA", rate:4.0, tags:["tradisional"], pop:2510, cp:"(0274)4464072", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nr4u4DWlNzku1kXCtL3-T5oQrzX9AB325OfVnCi1Z2YKQvtoeS2qVaZAsNHVsWu366A5Iz43xS8qLGZqLM2Pc_CVUbBA5fa_cBNnwJQLBg2qeExqx36-EJ2oUAoP3XT9jfRr5pBAw=s1360-w1360-h1020"},
  {n:"Warung Ijo Pak Pardi", area:"UTARA", rate:4.0, tags:["tradisional"], pop:1272, cp:"085643054143", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrplfnQMPm2x1f1uubebCU9ZKe4xAEGD5hunSjt2Vjsif7doJT1RqZ_JQHInCYwrzfO4L7UnU4-AkaI7wYPkKtgbq4TRXKMK78AYiYFkMFW7ZH5e4h8fNI1CmM5oP1pGyjXmvgi=s1360-w1360-h1020"},
  {n:"Pawon Jinawi", area:"UTARA", rate:4.4, tags:["tradisional"], pop:670, cp:"085643430490", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrXED-yIyoIqJ12HCo-oAl1iZViMimpo6nnZtPajATlLH_lwYCxzERgf3FADEHJLrU6rwfE9XKIonFwq_PSOkB1FtPSdRlLIFGeBG8Y7EBWcWwa_Gui8zHBRKjfYLoxRHzt68I5WxY496Y9=s1360-w1360-h1020"},
  {n:"Resto & Catering - Joglo Pari Sewu", area:"UTARA", rate:3.7, tags:["tradisional"], pop:2679, cp:"082244400500", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noh-_Mp_HXUzW1WiluspzSg5b-IeGLA_EN-i1fZVz1I9hZ9wJzGIDCGsUd6lr2y7GLKTNL-lOSnQQkh3FfVWJUrMmk98Kp9VP9VqpHwhIUDewZm_SKInRlmJbbUrS3eq2_Jmhm3=s1360-w1360-h1020"},
  {n:"Sasanti Restaurant", area:"UTARA", rate:4.5, tags:["tradisional"], pop:1542, cp:"081227879000", img:"https://lh3.googleusercontent.com/p/AF1QipMppe7UQKDf2o_kWzjpFZtFVwfxIj4eD8E74HGx=s680-w680-h510-rw"},
  {n:"Raya's Coffee & Roastery", area:"UTARA", rate:4.6, tags:["tradisional"], pop:730, cp:"08179250582", img:"https://lh3.googleusercontent.com/p/AF1QipNwgcLdII8TWYjEixvPDBg2HovidzohEE93EcUv=s680-w680-h510-rw"},
  {n:"Waroenk Pengkolan", area:"UTARA", rate:4.7, tags:["tradisional"], pop:694, cp:"081328043296", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nq_Lmo3hxzx58CiNVezhnWtf-SkzUqTBxl11ZCFFu0jdF9j87hNTBc7uCfMvEBPBmi6e5hjIWBJerJqQSvjBQjOXgdbV_owbQsBgQmsZKTMVDCdeWdMIK7ZmMg94E9bsop4SaDG=s680-w680-h510-rw"},
  {n:"Mertamu Restaurant", area:"UTARA", rate:4.3, tags:["tradisional"], pop:577, cp:"081386571414", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npvj_Tuklf9fP8zTXqM9uzVdrDr-rlb_OYB40YjzCLQ_3qPgTn6RM8dWZpwSgVbvhrVtoWI0nnK8uaRPuyRa3iYks48sRMnQo5VKIAYd7zR1lfe3I8cAtLkbtAXbAbTbqX05vdk=s680-w680-h510-rw"},
  {n:"Ikan Bakar Jimbaran", area:"UTARA", rate:4.4, tags:["tradisional"], pop:2214, cp:"(0274)4463983", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noy4YJ8lprgQJ4uNBVPGtgG-Ji0ON9vBncAcaD5whjESnogmyrk-4Gsd1eEVclsnOL6o38sJr-305CuKHjEgrgyZ8OtQLP0f32ZIkMHJYNUzn5CenFIOLhfeYrV0QShHb4JN3q4Zw=s680-w680-h510-rw"},
  {n:"Bale Bebakaran Jakal 9", area:"UTARA", rate:4.6, tags:["tradisional"], pop:2163, cp:"(0274)2838418", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nq58qaCmlzyNB_4ns67f5lvAzwNLyHdh6MX6an-_F4bfhWJwUi88mS1hXUSwlrjUS7xNt81FMhOqmzKypV7Te9sThVneiQTSBKJWEwRobQDIasVgbTGiHY38EFEOzUOAnQc5qZ9Kw=s680-w680-h510-rw"},
  {n:"Warunk Iciiik Iwiiir", area:"UTARA", rate:4.6, tags:["tradisional"], pop:1027, cp:"087838940347", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noSzIxMcYF8oSL6t3FpL498UtyeViGMI0EFda035UB4PIcOEdZrRWTvcQEAGDtxsF1rCCMGJDaE74YFaBoBbhNUEub2hxpePd-l_HyG4Wl5Vl7IKvyNsP7XBCRlBPSYibmCpdyj=s680-w680-h510-rw"},
  {n:"Waroeng Belik", area:"UTARA", rate:4.4, tags:["tradisional"], pop:2036, cp:"082123689200", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nq5c8yUtIboNmNPmMKVKYT59nq9rK5fs2YRamSM3mg0rXXNiL0QJHgeSwWqph1JanZg_XaK5upqfKRxkaf-VSRKsG_BwwGoXEJNK4eyv64wiFVyXBeWReBky9qSsQcroEB4gJ3P=s680-w680-h510-rw"},
  {n:"Ikan Bakar Cianjur - Jogja", area:"UTARA", rate:4.5, tags:["tradisional"], pop:3988, cp:"081130751665", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noS-zaa2pw2vIXIQwsseCLlajgaqxNIUKcffObPpSbiIX9w5FsF61zvJCJE5j8NvvRhkl7tpp3x9soMvhA2kV4lWinm_EaEuJfblnlq3znEy_gvKUzQqrr7i4-JQ403bmFYUJBx5A=s680-w680-h510-rw"},
  {n:"Muara Kapuas", area:"UTARA", rate:4.4, tags:["tradisional"], pop:2447, cp:"(0274)4533317", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrG-6G4C7zjvkYfZ7MRSJDGVMvmJ-Yz-Fw366DiglmJvPQseR_lz4BK4sHWIPR8Mc2-p9RqlxIdMUP6iugTEbZvZ1vhR0p6L57vNa8OUR9mMHYTVGta_sZcklrM4cCmQ8XnqDAlzRTo7KuN=s680-w680-h510-rw"},
  {n:"Sate Klatak Pak Dewan", area:"UTARA", rate:4.2, tags:["tradisional"], pop:528, cp:"", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npfqS15Z1bPgxDHu9vd4fz4rM6ICP3uoL1Y0o7EIOeLJmPhBq24Fyua9lp3nGc7YgCPvwlrprnjX9x7L2f1c52JwaEf9CC6BvUdVi99I4UzE3mNQYpoQCM3vC-gJlZ9Jc-0jjMy=s680-w680-h510-rw"},
  
  {n:"Tera View Yogyakarta", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:369, cp:"081359745720", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npjXP0dMLsC7s93T6dR8jHKXwTYyNnVVHEPiQBCWFEER3qJCBsaZaXTZc2uOisArDzRt5zcqMtyfDv-OfE9yk-xyiBmDYkmSl__3ELiUecgLx3_n_PIMBgYv97IQb57pPsAOSZhRA=s680-w680-h510-rw"},
  {n:"Kopi Gamol Iga Bakar Hotplate", area:"SELATAN", rate:4.2, tags:["tradisional"], pop:1250, cp:"082142615150 / 081325678160", img:"https://lh3.googleusercontent.com/p/AF1QipMsVfY3gszj2C2NDtVRi37vInrAyIUEIFqmOMzR=s680-w680-h510-rw"},
{n:"Joglo Resodinomo", area:"SELATAN", rate:4.8, tags:["tradisional"], pop:3454, cp:"085742233400", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npEUMwOJMpuX7qYwg2zsSoBgG1tPFXE5JJG2mTpEUFsSURw5dneNASLXn0tjbGr0Alj54bkGODJmOmIPz7tqOJiYIDeqdyS2U8TC9CHe6VGNIlBSxQt8kSVfJSdqLIAspe6rMwE=s680-w680-h510-rw"},
{n:"Ayom Jogja", area:"SELATAN", rate:4.7, tags:["tradisional"], pop:3492, cp:"(1) 08112957095 (2) 085742233400", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrTnWEbSbuIrVJm6bbBz3QpiNBtXTN-kH3yA-qpf5oMM_oiht5rabtLg756f0WqR_IStkTnaa0pbeTDg2YCvFpqr9H4rn8I9jV2BHzjwHl_8BkR7OxvzlvhOl44OsQLyj1fHx1LRU7BZ8-A=s680-w680-h510-rw"},
{n:"Sate Kambing Muda Balibul Wates", area:"SELATAN", rate:4.6, tags:["tradisional"], pop:1193, cp:"082140659809", img:"https://lh3.googleusercontent.com/p/AF1QipOu6aisPSJsXtglak8HeXjJMHNeMCsWf4Mdu7Fr=s680-w680-h510-rw"},
{n:"Kedai Omah Londo", area:"SELATAN", rate:4.8, tags:["tradisional"], pop:27, cp:"087738828832", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noaAyBDUQs4yFwFcGpvlX2R9K_cjfhfe_LXTbmRfWglqPQWje3cM9ToTBZ_1x8npKOPByQcUo7GIn_A6YkjX3WFCz1NyhZB6l2i8w-p5poda-l5_b9cqohZUmESQRAFKlM8HIhU=s680-w680-h510-rw"},
{n:"Waroeng Tedoeh", area:"SELATAN", rate:4.6, tags:["tradisional"], pop:2106, cp:"082224064446", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nr8xFMOw4QfQP_0MLF-ldbY85wEVVzd1kJWREHGAYGqOsl-_OddXODN5i8zpVwXma7O6inKog7erPHR4wlQT_TUQ_Badk--LfWkGcX1VUrpbjwagMH6x5mTrpatiIMbrv3cij9w=s680-w680-h510-rw"},
{n:"Kandang Ingkung Resto & Kopi", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:4555, cp:"081329864579", img:"https://lh3.googleusercontent.com/p/AF1QipNzWGOuq2EIumcUSAc9TOVwUMBRrwM35KzjaVE=s680-w680-h510-rw"},
{n:"Kopi Jolotundo", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:845, cp:"085198613532", img:"https://lh3.googleusercontent.com/p/AF1QipOCaE9tbAeDQbfJJuPnd6qbMRKHclGpzaLgRjWa=s680-w680-h510-rw"},
{n:"Ayam Goreng Bu Hartin Toyan Wates", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:979, cp:"08112644418", img:"https://lh3.googleusercontent.com/p/AF1QipMIHMa6F0RU3U8xyhomV_0B5RIYKUYxehGkNTqI=s680-w680-h510-rw"},
{n:"Kopi Randu Bibis", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:2324, cp:"02742816381", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noFLSQzGxNqL2zQutZhKUVvbJ7l5kOokMllZF1y3X90W7tagUGCZ3QEWlSeDbxqtlYSY3E_nWbO1JC5bXKREmyfKskGx6ENZv0J8APHFxUcFTX-W-JPpM9GM7NpyDloP1pBBNzgsQ=s680-w680-h510-rw"},
{n:"Angkringan Puncak Bibis", area:"SELATAN", rate:4.6, tags:["tradisional"], pop:4871, cp:"081548140056", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npiAvnmfkw0gFQTp9qZG6_V0GxxEKbDYfryB50XqI6XIbmfLK9UcY6145JOiikHDlMVPCmaiHm4VVVOIoyDMZqChgpAUJO6CEr_kJXxgfFNi1l1iEeAzTAGoMhLouy3dMbMV6Bd=s680-w680-h510-rw"},
{n:"Waroeng Pempek Cik Ana", area:"SELATAN", rate:4.7, tags:["tradisional"], pop:824, cp:"085878365681", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nokBWUXFCrYS7ykffCFQTIzZdhK4MFlygP-Ys03gkqUBEuYDul6G6uKmklcdRRTx4au0LD21g7vp4yvBzBMzRF0y-LvJWDZ3dk8gfr272f1RTSS2cgsKVLfR-d9zBUauje9tOPHgDhWnkU1=s680-w680-h510-rw"},
{n:"The Muara Jogja", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:1229, cp:"087719638778", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noDsP6p5v5i6PGmhVUwnbGQ6CVl03F_RZQ69xpzV5L3Eax6nAKqfwuk3bRK9_LlpsJT72SFGIRxVvIJoEdM0qCeHqqH9kqgIGKY2p9VZklVQ8oBoZ5EiZ8B4TO3VjdyFWaSDDzsHg=s680-w680-h510-rw"},
{n:"Kepiting Bang Ja'i Jl. Bantul", area:"SELATAN", rate:4.7, tags:["tradisional"], pop:886, cp:"081324346677", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nr_QULhE3_FSt8OdV7W31zj0qC9bM_Bi6SbugmJRbIdDVBxI1yI0vusTr5L1VFwyRj_JG7nUCgJY50JpmQqpwrAI5p54GQNZqOoU5qoX2pNd6RkTJThfUgsjK7R9vpUajMPnmSCv__pJrez=s680-w680-h510-rw"},
{n:"Sate Klathak Mak Adi", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:7382, cp:"085868622822", img:"https://lh3.googleusercontent.com/p/AF1QipMcXom6ZpeL5D7NkZkTTIuqTGufEm1KFM1FcE-H=s680-w680-h510-rw"},
{n:"Sate Klathak Pak Pong", area:"SELATAN", rate:4.3, tags:["tradisional"], pop:29237, cp:"08112645251", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrp1U-unUW3EkGOKMJBKQ_J6aRNWrPWuIsK_Z43XUUUIh-kuHp7GwWG7O2Y4iRy8TAmdAjKDI2tdHPa91_xyrSKCYIEjroTZ4N2mAM2caosR93BiFPhzKTWn-ukQMRlwFiBeawHhcrsGiCs=s680-w680-h510-rw"},
{n:"Cembing Dayu Resto - CDR", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:1847, cp:"087729821977", img:"https://lh3.googleusercontent.com/p/AF1QipOCwMS0OD2nrJmMGe-6BDZ4wrm_a-yvSQGu41Im=s680-w680-h510-rw"},
{n:"Kopi Puncak Rindu", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:3817, cp:"085716911691", img:"https://lh3.googleusercontent.com/p/AF1QipNeYrWXwx11jBLCTQPGIqysDZUQrCQbKra2r8X5=s680-w680-h510-rw"},
{n:"Ayam Goreng Jawa Mbah Cemplung", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:5542, cp:"082255444300", img:"https://lh3.googleusercontent.com/p/AF1QipMK-gxqRG467hiEimehWcl5t-JSxmeqWCDxcHkX=s680-w680-h510-rw"},
{n:"MANGUT LELE DAPUR ASLI MBOK MARTO IJOYO", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:7021, cp:"08122701724", img:"https://lh3.googleusercontent.com/p/AF1QipOOCf_sNdSBk8rP70xZ4AlWqAIca7I-5MTiDWb2=s680-w680-h510-rw"},
{n:"Bangsal Kopi", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:790, cp:"085642973781", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqTYvNvZt0dO1jx8mK4WPphDW4v92Ev-XaV6as7QdSBUJ6GAWsLs4LlCw3FXT4Ml-n3L8jotSbnHT6huPYJzvyRrqH4Y7csKxSIkiFHbdxqKVjY6IMGyMw8TNOiBOk00JlecN98=s680-w680-h510-rw"},
{n:"Kopi Tempuran (TEMPURAN SPACE)", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:267, cp:"085163049151", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noBj0nMiNzBnym9-kOEES49IgtKe9GR-aWIwmz6yt_N4wQ5Gvs8rmKTIoCJCDhtNDKHFRXUBCG9hjiCSaUVAY0iOC28x5yD-qiD-pOpZRNYDPzySQadiLTrNLxkdM_1S7sF38YjJ50-Iuq6=s680-w680-h510-rw"},
{n:"Kampoeng Mataraman", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:5608, cp:"081386440140", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqGnKny1UTNHHsZgC_YMSOYTfIcWFlt9u42JSmeiM0rJd12ZUl-IITr25t3v2DnZ1vdJIH8UmQJmfQgGOm-xBXW8Zr_YK1DK4mrv6siWK5jwHpgGmaA7lEoZxfF2A6TVbQevYOXIoPI28Gn=s680-w680-h510-rw"},
{n:"Tarudan Kitchen", area:"SELATAN", rate:4.8, tags:["tradisional"], pop:101, cp:"082147222125", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npFEFd5vjZdJSzhKIi_39Y9bHQhJ2MdsCVT_Y9f212tNHtLlTbBvGLoMZEz4fAa_sbWKRKxtNuxgu9klBPfWPzQh8-Cl58s7MGLu2G_P6gBuJjgWvNNllvyS3dtxgNfwNMocb1nyInXg_Qn=s680-w680-h510-rw"},
{n:"Bale Ayu Giwangan", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:5842, cp:"087812584446", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4novIEtrBcLdiupNlTtYbWQEm4INIkTDUe54P-RuqPQ1cpC2HBm8ceL75G6RQhQkJMcmZgPhdbdJt-ys0opmWayiAHJe3-8n_5BNIRwB_kIIUM8T5epRTbuKeUIO8c2g1l9oyXu0=s680-w680-h510-rw"},
{n:"Chocolate Kingdom Museum Factory Store & Kedai", area:"SELATAN", rate:4.7, tags:["tradisional"], pop:3438, cp:"085232300200", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nprR_d3IavIqOHfy9JbiCtqNdi-ih-V0WOBoL2rhGaoGki8haRrSNy6NW0nG0A27z9TmprXubcmxRgoxGcF9ZR7305Q_rMS3JZI7e-29j949E_0QLEz6OxNsu8hoD0rPLT1y_4=s680-w680-h510-rw"},
{n:"Jiwajawi Jogja", area:"SELATAN", rate:4.5, tags:["tradisional"], pop:1951, cp:"087713574413", img:"https://lh3.googleusercontent.com/p/AF1QipM7yeuhkYOuge_sdUVvR1dV_p9S4kXYE7wVlvop=s680-w680-h510"},
{n:"Warunge Inem Jogja", area:"SELATAN", rate:4.8, tags:["tradisional"], pop:1109, cp:"088216633966", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npG0gE1vJ5pblEJD2Tp8L7lTP_FBDo-SkTDVx_5tIUHzj5BhcMJqrAwk5Z2pMdIlVAvVPALDwFbgHwTd17HO1ijiP2TaCrnpib1jiTtHTvde9XQmr_6SI33Q_ClhWX1HiRU6rixpw=s680-w680-h510"},
{n:"Waroeng Pohon Omah Sawah", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:6215, cp:"(1) 0274-445625 (2) 08121572093", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrEpIPiIkz86kORsO_hCvKpHPrSYuUduWAS6wejCnZ0IKZBSWPX9qAYjk2pG2_8bNsyuYAy7zqJb05YOhZCDQrT2zOdlTOnBrRkF3KmpEQYMnzp1CGRvNwHgDreJ5LvHA5MTSnCSw=s680-w680-h510"},
{n:"Kebon pasundan", area:"SELATAN", rate:4.6, tags:["tradisional"], pop:946, cp:"0895365357330", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqWl_3as2DyQYCBw6dy8_LISEaELQ7wjV3-P0bYfyaWUml0NakfmOu0VE4YtkNsOKmm0jikarYNB8HNP3k3JqLaXO2jnc49hTeB7UtbWu6-eyK2T4pIquEjv2xzigAVAmUpEX8lM9QLSDyi=s680-w680-h510"},
{n:"SEMANAAK Warung & Kopi", area:"SELATAN", rate:4.3, tags:["tradisional"], pop:543, cp:"082227179669", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npbh-Zg90z1WiGjJyCUsbPW1nQvZJkU5Q_sajK5ic7m_iIixZTVtNG2VNkQWsGbjW4opTpoco9z2UkEJrqaHQW2di9n4qt_rPKIiPxcRQF_fZfixaq4zu6J0uA-0NQdOl0xTds=s680-w680-h510"},
{n:"Ingkung Kuali", area:"SELATAN", rate:4.4, tags:["tradisional"], pop:1978, cp:"085701101122", img:"https://lh3.googleusercontent.com/p/AF1QipPomkhax_swgdSi_72iwMLwsL61wQQ6ifbCoyDd=s680-w680-h510"},
{n:"Bakso Es Teler Pikat", area:"SELATAN", rate:4.2, tags:["tradisional"], pop:803, cp:"085183164125", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npWe0sFEgtY2mddMzdWpWwle6yuBthfNrqA68ko56LsI-rq_bVUTOzwPmqgIseGrn3ckqRKB6lsdwUgnzZQ5C8CXOtu5M0pntnipfDYkbNRDmEugv8iOH698FSE_6fOV-cOTuFiBg=s680-w680-h510"},
{n:"Resto Indrayanti GK Yogyakarta", area:"SELATAN", rate:4.2, tags:["tradisional"], pop:695, cp:"082135255558", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nq9REi2i6sZNrxQJyT9Y_XMnVDbfw-TTOnQgjXPIWoXpViPhwLQQUw31Ij6ZbxIXeaGkf6cJhD5XYsVBHcxs8SUszJwoN2bgKZQfreql-c1LQyC2HaERd4V5ALTKwHinPJyEFzGcg=s680-w680-h510"},
{n:"Paon Dharmo ( Restoran )", area:"SELATAN", rate:4.9, tags:["tradisional"], pop:117, cp:"0895709199939", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqLq8bdQYGTUg2PRLwTs_bp0VN-tB3wlpCzG7EDZeyGLcQhnlJljdWtsZTC-4Wqdcy3lTNytXdhpoLZoVii7ZkYpD9R45dOn4AVLOl-kn9fkO20ekAgEEOXgKj3z6HwUsIUvWzj7w=s680-w680-h510"},
{n:"Resto BUKIT CUBUNG", area:"SELATAN", rate:4.2, tags:["tradisional"], pop:577, cp:"081392091970", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrjzsFgr2p4HiEBcTaBTFgCyCMz-jNtJ7XCHsgXYCWEjYmWkTX9LkPOgih-0PbEFDkRbjy_blYLuj7r04A6mXqFLDgn2TPAX4xFEZr5X5c2yzQSqACZi3R5tGNZCcv-IA1JJokr=s680-w680-h510"},
{n:"OTENTIK Resto & Cafe", area:"SELATAN", rate:4.8, tags:["tradisional"], pop:218, cp:"088988878889", img:"https://lh3.googleusercontent.com/p/AF1QipO78MwaHYmF2XL_MWAGuXNGo71PpcdNIAEVGi4m=s680-w680-h510"},
{n:"De Atemos Resto", area:"SELATAN", rate:4.3, tags:["tradisional"], pop:1196, cp:"(0274)721866", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqyfrCwYt7c_qc6B27gq00GbusJFZvR4wl22qVZm-yR68ui4Jyk-CRxvlVUCJpU5CAcnvsQWkggijiQSIszoqMPStMkIeU3JMv6RJohXOCZrdGdCkmeaQ7h6bt-aFaDAlRrd0Mf=s680-w680-h510"},

{n:"Watu Lumpang Resto", area:"TIMUR", rate:4.3, tags:["tradisional"], pop:814, cp:"082134304282", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npBeL-py5wvoo_kf2aNgRWs5RAzkNPe8cbLy-pYgP0TIO66BD0tKbr_pSh1J3L75Pz7p2lqUx5fiz5AwnnNKh_7DVzDY3i0xeF8hEvRLALMc2755fU6V5qXtw5pIt5vYQITdJ11=s680-w680-h510"},
{n:"Soto Moneter", area:"TIMUR", rate:4.6, tags:["tradisional"], pop:1243, cp:"081949820369", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nraG6LjrKLwKPhZMCFrJ-56GfztHDLbAGHa8b5GhuGpG-VR5PGwU9FeqqrV2kvulJg5BSQTUDw7D9mA-MMlicZM7mDqXvSegps2G9oOkf-jyXiBjbigJ4isvWq8qzLxXZoAMCA0=s680-w680-h510"},
{n:"Gudeg Go", area:"TIMUR", rate:4.3, tags:["tradisional"], pop:825, cp:"081770701600", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqDoXP1nML7FucPnAbrW9Tab5U9WUHjgDz8JgebUepDd6Hckfdhxe4GDVQWevrMyNGhwVkqgjRwoBkwSKiNy5zcXjGqeYG5dvZ_wR6ogaDMPaOON8Qg9AvfPL-t23_zRLHQMtu8=w223-h160-n-k-no-nu"},
{n:"Soto Bathok Kangen nDeso", area:"TIMUR", rate:4.5, tags:["tradisional"], pop:2864, cp:"081215323146", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npzneceYzCxAhW94_8HnPVG7Kqvm2fUF6qoXfc34cU6wmThcLNPSPbCaHPpdjtAGNftdesad3Q6-0ZeSvq03ac9cLezGQ8bCrmFv9YrNRpeTJBqqc664-jJQoUD08ix5SOQ0GKRp2a8TII=s680-w680-h510"},
{n:"Wulenpari", area:"TIMUR", rate:4.4, tags:["tradisional"], pop:720, cp:"087839427171", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npXYWGPcv8UY05G7oBNpK9kKIFl2kA6kFD3VBq37VDf1zZTAii6BFG78phYCxOKbFQJYMSAyDxjSdPttXV4ZOdfG8UN9dVdWZEhDgBrqPcWn1FNcevFWsHgTkVZvPFqsgnKnCCvtQRpsY26=s680-w680-h510"},
{n:"Limasan Klampox", area:"TIMUR", rate:4.7, tags:["tradisional"], pop:909, cp:"082350209944", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npstwX0Hq4WAf7UFJnef6ptR-BptGOHUoFzywGoU6taylwSXzmhMGREv0xmj0EfT2y6g0YrSrz-ahlXdu2Kp7xHQpJl7jnBSoyfVAmmz8PeU_EWiPl9aAsEp3MXibyi8TjlbYC1ZAPC3H9K=s680-w680-h510"},
{n:"Tengkleng HOHAH! (Kuliner Kambing Istimewa)", area:"TIMUR", rate:4.5, tags:["tradisional"], pop:7734, cp:"088216304339", img:"https://lh3.googleusercontent.com/p/AF1QipO_sITHUqj6hbxjLHe4HiB6ILbFxOhtBkldVt1a=s680-w680-h510"},
{n:"Soto Sapi Mbah Doel", area:"TIMUR", rate:4.9, tags:["tradisional"], pop:268, cp:"089518736958", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noXx284ZrdXbEQqiLKIy6j3MWcSg-DMBCUPx3dUgeio774hkNUVGiwYVoAJPlp3rrjuuYp8Vzd3rxKgfwn8XeMVar_TDT2feH_hDBBWwVPghxvEh8GXBJF69uQbMu3AmqXqMfGb=s680-w680-h510"},
{n:"Sego Berkat Wonosari", area:"TIMUR", rate:4.7, tags:["tradisional"], pop:196, cp:"081392989611", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npTdENEbL2WYP7ZNXr_xyPC0DFcmqSqHWrR2AtUWHWwojK5JKpV_CI7yo_6TnLpXAjVNqANvsipnsAjIjgtrv0zc8O5NNsmGv6y2DVqlSfQEq2pZhmc9zBwRx49NhiHGP5Q_eU=s680-w680-h510"},
{n:"Kopi Bambu Berbah", area:"TIMUR", rate:4.7, tags:["tradisional"], pop:47, cp:"-", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npjf54p9oa6OgJXWS2ofGqj82hEoy7vjXzT5PqIKSXMECaU2s_WdfNCIgJfJt8F4liqPgCEsQ6KMUCyvR7fSvp-iCl1hm5l0ILU7BLKe23ELZhBQhkcQf3xxN6_UfbpJmy9cPGh=s680-w680-h510"},
{n:"Bale Roso Resto", area:"TIMUR", rate:4.4, tags:["tradisional"], pop:5021, cp:"08122226967", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqzYUhhcKyDv-Qzu4MLqk7oAyn2kzJL1s5zM5kD7aIvaTfueUVoove1z2yFdvLai0h-z4UqqVgpvG0gNNlsCFfOJnEDK69b4UW_F9epEz0sArUhglZCJBYvYtAfLL7cTgMyQrE2vg=s680-w680-h510"},
{n:"JOERANG warung makan rakyat", area:"TIMUR", rate:4.7, tags:["tradisional"], pop:134, cp:"087839880613", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrE0-mdgzt0sfh6J-SOZFc6vr7GcfSKwJGBc_WTVqHQ20gHeZpatu8BqnLEAzIGpcyBHjbNuNfhKDiX7O8ZaoGHSGyS2Zo6RvNjIvL3l5bDnqNimRnjjzeOosez13JCm2YGG3Y=s680-w680-h510"},
{n:"Omah Eyang Resto", area:"TIMUR", rate:4.5, tags:["tradisional"], pop:1980, cp:"082137100118", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqTDYA0ufBWjqx7kabP938QsLM9lTVD50Nv5nVPnQ7gHgX5zrOrBf2YsCw-iPi1dLWF9Kuzw4hMy-J2_DxdK3lmxHb7TBw4IkgTKryUXQ3y0FBW94uNqqcl9FtJXD6dSWTBfaY0qzjfuNnU=s680-w680-h510"},
{n:"Pawon Mbah Noto Plaosan", area:"TIMUR", rate:4.3, tags:["tradisional"], pop:654, cp:"085293167647", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nr6y4nHif00WsWkuZwIZPG9RNYaz_SHh5j65PVOO60i7PKQo4lWGxhkPTjoJsDqlJSqRqlWsQf6mAsebTb9zZupYuR27RXpSPVfGg20DF9nvvpa67UGmoA56Luk4Lktov13pcqU6w=w223-h160-n-k-no-nu"},
{n:"Grafika Restoran Kalasan", area:"TIMUR", rate:4.1, tags:["tradisional"], pop:6499, cp:"(0274)498410/ 082136174810", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noB-FWVKm7_eScpWD4geXidiId7asnKjfxeY0KOHFIPwVCJj8C41aa9Es2kJ6By-4t4NBi2oxsesp3ED5wi0QCF1Wo6Uc4dTWwoJb0fqfyq8SGFU1L_FTymodgY4X7dpNPLpeWKmNWIci4=s680-w680-h510"},
{n:"Pawone Bali Kandang", area:"TIMUR", rate:4.6, tags:["tradisional"], pop:286, cp:"085878880394", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nojKCXZXTRSEowb0F7Pprh-oYQ7zXcPJ5EW7tRwnC3paijsa29T6fGmWc5L5xU33mm-MI2NeQpmIMEPPl8J15v5CopjGOM3Cv5yABRZaT8Bcv5XTGMbC4XEim1BQDZdeV-JuFxdEaH28haR=s680-w680-h510"},
{n:"Warung Pethel Bakar dan Steak PAK KAJI PAPAT", area:"TIMUR", rate:4.7, tags:["tradisional"], pop:11111, cp:"082110010880", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noiQ7voXcarUvOgVUu1mqTgsxb0Ia7gnmrMRhEflKaJnNO6uTfDdkuKZQDGhEEHR_-S2IBwzlz4iQXpNfT5l9PjfVAONJsQleCatLOedzVabMfeaDNNreUTqKzvLO6Bx94OOjsJXAwziC-Z=s680-w680-h510"},
{n:"Rumah Makan Mataram Indah", area:"TIMUR", rate:4.6, tags:["tradisional"], pop:477, cp:"085877314444", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nq3VqosWu3B4X_xmb76sSgMmr_indeYPzlEmEDd6tKNM9nmSNW9gwbhu9zpw35vyEGDlR3W7bhmn31rFrEmcNpM-D80AWpLIX3YHdPDyqzuJ55xz7ne7SekESPL8U4eIIsxeUKOWiapglnG=s680-w680-h510"},
{n:"Kebon Sumilir", area:"TIMUR", rate:4.6, tags:["tradisional"], pop:604, cp:"081328576046", img:"https://lh3.googleusercontent.com/p/AF1QipNNdVfPAPv5otYoz9FJerVk067jCDCkb2FDxmLV=s680-w680-h510"},
{n:"Resto Maduroso", area:"TIMUR", rate:4.2, tags:["tradisional"], pop:924, cp:"081225224997", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqMUfSfmRHpPaKgiH9u9oFESgnq--NDOOjELWRSxQr7R_EW9tqOIQLrVjBSsaN9yw5b-k6ze3k36uceP0b2PgbiLhQVQpng_XfP9hSiej9zQ0KpMQbfJ_8jnJZOw5pygyYhv7qoNA=s680-w680-h510"},
{n:"Green Garden Ramayana Resto and Lounge (GGR)", area:"TIMUR", rate:4.3, tags:["tradisional"], pop:704, cp:"082218777233", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqqNAYhyjPMAWx3ZugNHFWH69kUP7_2kMwNrKvdjX9OLEzbuRGi3_l0HDJoK3bnqSBhPT7xE_vDeepTpIOjl5jegls65GtSd0Iyl6S5MuIsM5_oaETSXtqED5whl-kwh0-5O04OgTdznjjw=s680-w680-h510"},
{n:"SalSari Resto & Coffee  ", area:"TIMUR", rate:4.5, tags:["tradisional"], pop:368, cp:"081233003040", img:"https://lh3.googleusercontent.com/p/AF1QipNX9FR-aSgkmlFYiIFV_Q_My9dw6d1SH8eyoP0r=s680-w680-h510"},
{n:"Ayam Goreng Suharti - Laksda Adisucipto", area:"TIMUR", rate:4.5, tags:["tradisional"], pop:8315, cp:"(0274)484522", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrAvueZ5W2oWofHuV7ZBL79VTch0xx3s9zDLV8Hc5ACY7tHldH9KhsNmqoCi4RZLFOpoudseQNsrFVWg74cK8T23DIo0X-SScutQ2j8U1gkyCNk9Qf4jOa3wr8ERXBi8o93lMhb-g=s680-w680-h510"},

{n:"Kopi Ampirono", area:"BARAT", rate:4.3, tags:["tradisional"], pop:6050, cp:"082226730823", img:"https://tse1.mm.bing.net/th/id/OIP.u5kCsw_JRRbrSeVQA2HDcwHaEK?pid=Api&P=0&h=180"},
{n:"GEBLEK PARI (Asli & Pertama)", area:"BARAT", rate:4.4, tags:["tradisional"], pop:5442, cp:"087700339676", img:"https://tse2.mm.bing.net/th/id/OIP.PhrOVdzJybJrBltEscWoRwHaFj?pid=Api&P=0&h=180"},
{n:"Lor Tinalah", area:"BARAT", rate:4.6, tags:["tradisional"], pop:441, cp:"081918357386", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npGLLl6gC0-fMQplk2BBGSKAapNgT2I2J-CXSU9VSovfbTQRofDcm6cGjiLZQP2oJrR3lvmgizCjgaWkJwwsPNJ3ulepV61_okLkqlzGw-foJfm3iSt-qx4TQdoNr6tniVnCAe3Iw=s680-w680-h510"},
{n:"Menoreh View", area:"BARAT", rate:4.6, tags:["tradisional"], pop:2111, cp:"087722345101", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqulhTPxwAAZ_BZtuB6sXfiqqLx4pA2X-cFixS7i1qvN9SuPf9mI-ieC0s-E_EoYi5T6jLP7U31ERn34L1-77llypd1v_qml0eaW2AuPZ42uN0zCMG5NM-hUGxHALn2pCF_qcNj6dv3YuA=s680-w680-h510"},
{n:"Sate Kambing dan Kelinci Mas Fuid", area:"BARAT", rate:4.7, tags:["tradisional"], pop:419, cp:"082300061116", img:"https://lh3.googleusercontent.com/p/AF1QipM45WDN7kEBtiFaTO2zluzKb720RgA4Og9qoFmK=s680-w680-h510"},
{n:"Mbah Bayan Jogja - Kitchen & Coffee", area:"BARAT", rate:4.1, tags:["tradisional"], pop:1131, cp:"085755777729", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npSGOotJTq9t-DwPe6OYltknwxfwoQE5RdUzEIjsoTcyPljzRSho0j9lddzsNJTnVif0AD2vO5fPze1rbQ0KqXsJ1ocznpkyFZ68WNNqAxCgu7q30AI2i3eRR-teriyxYQr9NJSgg=s1360-w1360-h1020"},
{n:"Gandhok Coffee Sendari", area:"BARAT", rate:4.5, tags:["tradisional"], pop:46, cp:"082325354301", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrT3T-lYLz2ZS4lNtG5TdHX7TSuLaCvrv9ieBtDl_1WKyEYxaoJgv4q4d6ekK7e3JTDlyfhQESRFYClkJgO77xsl8n1AZTmx_p41NYV0RukcTN_q0JQ3kZf_nkLDcAA3J6awxEHyMOJ9Dg=s680-w680-h510"},
{n:"Angkringan Timbangan Tebu", area:"BARAT", rate:4.6, tags:["tradisional"], pop:743, cp:"081325999334", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrpx-_SsVgRl3bl9j3pdijP9bu4cA7Jnl5eMUwLZffHCo2L6_hprJeYEkeOnBuVrblvffLlgKPsveUHhNNOAuXpjUi4hM1aD_V0LDCl-bNgvdsb0HKjKtRCCxmd9jg5LRgrqDCcDQ=s680-w680-h510"},
{n:"Gubuk Makan Iwak Kalen", area:"BARAT", rate:4.3, tags:["tradisional"], pop:4476, cp:"085100150801", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrM1QbPOgl4YcgkwSD76AsUYIfWS_uhxQ6HFWmNw7eopyvQ1hENUQ9OOpyMeDgv8Bu5wQEB8VoqfzCpRcm6vApyofZoAiWd4kW2xIHSOMH95W86dpEYuxlmJ7h-_-ul8bmHc8L9rbwqyHDi=s680-w680-h510"},
{n:"Baleroso Godean", area:"BARAT", rate:4.5, tags:["tradisional"], pop:2122, cp:"081802188885", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqEgglpHPcCAXW8ucLqtnOUPOxcK31pBKZGXalsca0SNQFDHydLFeqhcbIbuXPGCti4bK_zDBz2043QpsvF2VK2nm-1bNDktEXGbeVfiyJDqOBN-G3HvZkL7TZVV6y1oEah-cBzjg=s680-w680-h510"},
{n:"Kopi Gamol Iga Bakar Hotplate", area:"BARAT", rate:4.2, tags:["tradisional"], pop:1250, cp:"082142615150", img:"https://lh3.googleusercontent.com/p/AF1QipMsVfY3gszj2C2NDtVRi37vInrAyIUEIFqmOMzR=s680-w680-h510"},
{n:"Sop Iga & Ingkung Mbah Geol", area:"BARAT", rate:4.3, tags:["tradisional"], pop:579, cp:"085729919759", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noV7lcebDLqzDrVwzqt2GLqDV_iQnPx2eamVSJ72Z-i15Wa0a2PhrfTnKibxEbkitqqQ_wFWJ8FYEfUb6D5Bt6LRDy1uHJs62hH_1rAvLu9PMlH449Zttz6SHmKG5WXkyzkd0-ZBA=s680-w680-h510"},
{n:"Omah Cantrik", area:"BARAT", rate:4.4, tags:["tradisional"], pop:2060, cp:"081227510573", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqh_W0AOKhTmvK7bfUKWsM_j556O4TF0MMe0xHywsKCt72DoOqUK6YxTO6RImTpWdJ_S7tZARI-DgYiNWMoQXl64ScBtDvB1EF3JMjvI5D4VXWmeUMMKBYlkPsJE-I9oPirlJ3QA3hXPB4=s680-w680-h510"},
{n:"Kopi Ingkar Janji", area:"BARAT", rate:4.6, tags:["tradisional"], pop:6131, cp:"088233648337", img:"https://tse4.mm.bing.net/th/id/OIP.0Crrx0OhNASKPkjrFG5BAgHaIy?pid=Api&P=0&h=180"},
{n:"Warung Watoe Gadjah", area:"BARAT", rate:4.2, tags:["tradisional"], pop:2636, cp:"08817603774/ 08122704855", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nolD2y-ejeofGedDgfEP6ESFuWWZE9dCNBskFQpUhTMuZNK9F1nPN9C_M7JaUAig7KZyVs2Ju53JtSM_uyHTMl5a1_pirl6yB8iKyvVUzFAp9UDdACJQbJWqbkDy2YwvZP-zsGgT0Eb5uAb=s680-w680-h510"},
{n:"Lemah Ledok Garden Resto", area:"BARAT", rate:4.4, tags:["tradisional"], pop:2253, cp:"081229008789", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npdjzVIzz21x4jqd9o6OtroI2KOrtbNhvel90K1NFZ-em6jnyP3npPHTV-nSr-UDgJWZpF4qjRky8AkSzglHCOF0IntAJWaiRQlSNgF_B_g0NfmKI4pjzQdI6hGTmrTpMyCLZ02Ng=s680-w680-h510"},
{n:"Bakmi jowo Pak Budi", area:"BARAT", rate:4.9, tags:["tradisional"], pop:26, cp:"-", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nrQ7YWYwNKFDnAQ5oYV1Kgxder6F4svYj0jALVLJ011LGSn4yom2YbaLr3bfk5ERclBlxWVT-nMe7xTdk8Ip9va0FPzdKw_hioiCReIdblZUrtc8G218MymDpTdmqx5eo4LQJ-ASQafKoSg=s680-w680-h510"},
{n:"Teko Tenang kopi", area:"BARAT", rate:4.3, tags:["tradisional"], pop:427, cp:"-", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noedFM4quh4ItJeB5NSsduObUgfXMNfV7pny-AdRuyGirWUfKiSYJnqqPPUaas3F_py0YF80J3s-oYqJaA5v6SHbw8jijemmZbH2yLDeL4CkiWT95x1q9fDqlhDVHW350RHzZPT=s680-w680-h510"},
{n:"Gudeg Manggar Luweng Kayu", area:"BARAT", rate:4.5, tags:["tradisional"], pop:263, cp:"085747978651", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqKvtNqMUYm6nwcxxGE7c6C7QZz9FuHTYEvqsotCBZkIskMbuqXhf95IASvGGMv-9TMCEM9HYeZ7nbSmxIo_Bafs_L7KXWf4MIJfjBzapuc4cYWukHXHbG41x6JL0heLZH-RpU0wqxvvuE=s680-w680-h510"},
{n:"Pawon Mbah Mar GAMPLONG", area:"BARAT", rate:4.6, tags:["tradisional"], pop:100, cp:"088980046661", img:"https://lh3.googleusercontent.com/p/AF1QipN2_71XQqGW6H4p0r0iSklwRRpiNBOo6QsAe7_j=s680-w680-h510"},
{n:"Mbok Thing Thing Resto Sentolo", area:"BARAT", rate:4.7, tags:["tradisional"], pop:338, cp:"081328654800", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nop1tbGt7Cc-PVajUpvEeW5P1DYIiTHRdcvL6ZKYHRcqi4QGK8nEsvqhvtrdpb5d2-Rrh3Vu3GZwgvDOqOsMa0_9zstBPZtVov0CLTsD-n7RJMh9f56YY_W0l-t5p9RFiA-eTSX=s680-w680-h510"},
{n:"OmJoLa \" Omah Jowo Lawas\" Resto & Coffee", area:"BARAT", rate:4.4, tags:["tradisional"], pop:800, cp:"081328370707", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqm2x4oUZQse4UCN87xWe344XZ-owAYdCxbvpnp3wivnLrl00Wp41sU_CuTfFRQIagxFzpwy3HwC1YtWcNCGZbgInVHvmaN_wOS4-GUVjCiSXvBhppw1cS0s29n_Fk92tlEgcKc=s680-w680-h510"},
{n:"Kripala Dekso Coffee and Resto", area:"BARAT", rate:4.6, tags:["tradisional"], pop:706, cp:"081211343394", img:"https://lh3.googleusercontent.com/p/AF1QipNzncmU28pcLY9J_4jglK4vFOti9vFp2M4pxsnw=s680-w680-h510"},
{n:"Banyu Bening", area:"BARAT", rate:4.3, tags:["tradisional"], pop:1088, cp:"085725826873", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4no8499Uw3M20hA_r-cRrqk9JMCx6_apadsM_SOhjeZT84wpp7Atni2fA9C4jjHP9TUE5DkDbaa6v87APLBBQX_9OMNyNjWNpZONJKsngEwusiDPzW1eMKuZmNIDu7IE2qwelrQR=s680-w680-h510"},
{n:"Dadap Sumilir", area:"BARAT", rate:4.8, tags:["tradisional"], pop:3977, cp:"085283343433", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4npgZ4NxIIulR_i_XknnKM4VKZaJYu_FBJiMUqkeuizw87gtLQTRFmExBPQraqUTz88aUYS9busPmnwYIwhYg1-a1LfpulHUsyvGh9FDpsge34nUUgQG0P1cs0WHQNt4ckTu66PTfQ=s680-w680-h510"},
{n:"Ayam Ingkung Mbak Sri", area:"BARAT", rate:4.2, tags:["tradisional"], pop:2143, cp:"085106206074", img:"https://lh3.googleusercontent.com/p/AF1QipPEGohGViShYBXyfndHAhX8XTAvmF8HhM0EOWRG=s680-w680-h510"},
{n:"Kepik Sawah", area:"BARAT", rate:4.2, tags:["tradisional"], pop:2417, cp:"085729828282", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nqDcBgXrnoBrsWoCmAsKH0hBEIIaPCzzK1_WWqydnDWR85MQWGxTjagLjx-4LGpU5NtPcWHhgPNgrPhggTwur4OjKg350-5NlyfSV8ottYysu49Apwe7EZ0NflJFRigELTo2ZU=s680-w680-h510"},
{n:"Omah Tobong", area:"BARAT", rate:4.3, tags:["tradisional"], pop:2314, cp:"081390035345", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nopcTl2BjbCyuBIAuO-UyLki2s2YP3GD4LUEkRHu2kS1Rxp2TAuxFylvOIUPDNqmZVYLuTzTEeZQQtp3y80Z1aVjn5-o0vmrXVO5j7eNUbfsUkV977J4mTfx2_rTrloiqPOJ8Jb=s680-w680-h510"},
{n:"Oemah kopi menoreh", area:"BARAT", rate:4.8, tags:["tradisional"], pop:148, cp:"087705005445", img:"https://lh3.googleusercontent.com/p/AF1QipN8UY5kfq30rPvGUvIcAJ3UWZz8prFTygt7UilJ=s680-w680-h510"},
{n:"Liwetan Sunda \"MBAKAYUNE\"", area:"BARAT", rate:3.9, tags:["tradisional"], pop:298, cp:"081319013225", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4nplfkLw-0g0Svkz0Krrqi43dKDe_Etq5eXGsayHk5xSvajMqHiXlOjeYxEOwCArkKjFN9QIftjd_99ykqsNGtWzEaALPYpABrTzYqYzSrh1UUjQU-s09j-lBcsamPTLdAQoD-4lYgfkvkc=s680-w680-h510"},
{n:"Seblak Prasmanan ABC Nyi Iteung", area:"BARAT", rate:4.1, tags:["tradisional"], pop:322, cp:"085336578247", img:"https://lh3.googleusercontent.com/gps-cs-s/AC9h4noKKjwX2NajKPf1G1LIx_GE0hYUhECg22_YaQeUCDhPRemZdaOgmH5CCf5_NpTWaeiAk6fTppLE-Jwpky0bl2EHqBYYjAf8ipnhnL35NnWDEXbIXefbR-77yYO2JY6tkpc5D5ixs39QNs3_=s680-w680-h510"},
];

// =========================================================================
// 2. INIASIALISASI & FUNGSI PEMBANTU
// =========================================================================

// Dapatkan elemen kontrol
const qInput = document.getElementById('q');
const areaSelect = document.getElementById('area');
const sortSelect = document.getElementById('sort');
const minStarsSelect = document.getElementById('minStars');
const gridContainer = document.getElementById('grid');
const countElement = document.getElementById('count');
const modal = document.getElementById('modal');
const modalName = document.getElementById('m_name');
const modalBody = document.getElementById('m_body');


// Fungsi untuk membuat rating bintang (HTML)
function createStars(rate) {
    const fullStars = Math.floor(rate);
    const hasHalf = rate % 1 >= 0.5;
    let starsHtml = '';
    
    for (let i = 0; i < 5; i++) {
        if (i < fullStars) {
            starsHtml += '★'; 
        } else if (i === fullStars && hasHalf) {
            starsHtml += '½'; 
        } else {
            starsHtml += '☆'; 
        }
    }
    // Pastikan rating ditampilkan dengan satu desimal
    const displayRate = (Math.round(rate * 10) / 10).toFixed(1); 
    return `<div class="stars" title="Rating: ${displayRate}">${starsHtml}</div>`;
}

// Fungsi untuk membuat HTML card restoran
function createCard(r) {
    const encodedName = encodeURIComponent(r.n);
    const starsHtml = createStars(r.rate);
    const mapsLink = `https://www.google.com/maps/search/?api=1&query=${encodedName}, Yogyakarta`;
    
    return `<div class="card">
        <div class="media" style="background-image:url('${r.img}'); background-size:cover; background-position:center;">
            <div class="badge">${r.area || 'DALAM KOTA'}</div>
        </div>
        <div class="content">
            <div class="title">
                <h3>${r.n}</h3>
                ${starsHtml}
            </div>
            <div class="meta">${r.rate} (${r.pop.toLocaleString()} ulasan)</div>
            <div class="tags">${r.tags.map(t => `<span class="tag">${t}</span>`).join('')}</div>
        </div>
        <div class="actions">
            <button class="btn ghost" onclick='showModal(${JSON.stringify(r)})'>Detail</button>
            <a href="${mapsLink}" target="_blank" class="btn brand">Buka Peta</a>
        </div>
    </div>`;
}

// =========================================================================
// 3. FUNGSI UTAMA (FILTERING, SORTING, RENDERING)
// =========================================================================

function renderResults() {
    const keyword = qInput.value.toLowerCase().trim();
    const areaFilter = areaSelect.value;
    const sortValue = sortSelect.value;
    const minStars = parseFloat(minStarsSelect.value);

    // 1. Logika Filtering
    let filteredData = DATA_TRADISIONAL.filter(r => {
        // Filter Pencarian Keyword (Nama atau Area)
        const keywordMatch = r.n.toLowerCase().includes(keyword) || 
                             (r.area && r.area.toLowerCase().includes(keyword));

        // Filter Area
        const areaMatch = areaFilter === '' || r.area === areaFilter;

        // Filter Minimal Bintang
        const starsMatch = r.rate >= minStars;

        return keywordMatch && areaMatch && starsMatch;
    });

    // 2. Logika Sorting
    if (sortValue === 'pop-desc') {
        filteredData.sort((a, b) => b.pop - a.pop);
    } else if (sortValue === 'rating-desc') {
        filteredData.sort((a, b) => b.rate - a.rate);
    } else if (sortValue === 'name-asc') {
        filteredData.sort((a, b) => a.n.localeCompare(b.n));
    }
    
    // 3. Logika Rendering
    gridContainer.innerHTML = '';
    
    if (filteredData.length > 0) {
        filteredData.forEach(r => {
            gridContainer.innerHTML += createCard(r);
        });
    } else {
        gridContainer.innerHTML = '<div class="empty" style="grid-column: span 12;"><h2>Tidak ditemukan.</h2><p>Coba ubah kata kunci atau pengaturan filter Anda.</p></div>';
    }

    // Update Counter
    countElement.textContent = filteredData.length;
}

// =========================================================================
// 4. FUNGSI MODAL
// =========================================================================

window.showModal = function(r) { // Dibuat global agar bisa dipanggil dari onclick
    const starsHtml = createStars(r.rate);
    const mapsLink = `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(r.n)}, Yogyakarta`;
    
    modalName.textContent = r.n;
    modalBody.innerHTML = `
        <div style="display:grid;gap:12px;grid-template-columns:repeat(4,auto);align-items:center;margin-bottom:12px">
            <div class="pill">Area: <strong>${r.area || 'N/A'}</strong></div>
            <div class="rating">Bintang: <strong>${starsHtml}</strong></div>
            <div class="pill">Rating: <strong>${r.rate}</strong></div>
            <div class="pill">Ulasan: <strong>${r.pop.toLocaleString()}</strong></div>
        </div>
        
        <p style="font-weight:600;margin:16px 0 8px;">Contact Person</p>
        <div style="background:#f8fafc;padding:12px;border-radius:12px;margin-bottom:16px">
            <a href="tel:${r.cp}" style="text-decoration:none;color:var(--ink);font-weight:bold">${r.cp || 'Nomor tidak tersedia'}</a>
        </div>
        
        <p>Fasilitas: -</p>
        
        <a href="${mapsLink}" target="_blank" class="btn brand" style="margin-top:16px;">Buka di Google Maps</a>
    `;
    modal.showModal();
}

// =========================================================================
// 5. INISIALISASI & EVENT LISTENERS
// =========================================================================

// Hubungkan event listener ke fungsi utama renderResults
qInput.addEventListener('input', renderResults);
areaSelect.addEventListener('change', renderResults);
sortSelect.addEventListener('change', renderResults);
minStarsSelect.addEventListener('change', renderResults);

// Mengisi opsi Area secara dinamis
function setupAreaOptions() {
    // Dapatkan daftar area unik, filter yang kosong, dan urutkan
    const areas = [...new Set(DATA_TRADISIONAL.map(r => r.area))].filter(Boolean).sort();
    areas.forEach(area => {
        areaSelect.innerHTML += `<option value="${area}">${area}</option>`;
    });
}
setupAreaOptions();

// Set tahun di footer
document.getElementById('year').textContent = new Date().getFullYear();

// =========================================================================
// 6. LOGIKA OTOMATIS FILTER DARI URL (untuk link "Lihat Detail" di pilihan.html)
// =========================================================================

// Di bagian akhir script pada restorantra.html (kode ini sudah termasuk dalam kode lengkap yang saya berikan)

function getQueryParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param);
}

const initialQuery = getQueryParam('q'); // Menerima nama restoran dari URL

if (initialQuery) {
    // 1. Dapatkan elemen input pencarian (qInput sudah didefinisikan sebelumnya)
    // 2. Isi nilai input pencarian dengan nama restoran dari URL
    qInput.value = initialQuery; 
    
    // 3. Panggil fungsi render utama secara LANGSUNG untuk memfilter data
    renderResults(); // Fungsi ini yang akan menjalankan filtering
    
    // Opsional: Scroll ke hasil
    setTimeout(() => {
        const firstResultCard = document.querySelector('.card');
        if (firstResultCard) {
            firstResultCard.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }, 150);
} else {
    // Jika tidak ada parameter 'q', tampilkan semua hasil
    renderResults(); 
}

</script>
</body>
</html>