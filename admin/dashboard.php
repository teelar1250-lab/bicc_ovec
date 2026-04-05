<?php $pageTitle = "Admin Dashboard — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sidebar-bg:#ffffff;--card:#ffffff;--card-h:#f1f5f9;--accent:#3b82f6;--accent2:#8b5cf6;--teal:#0ea5e9;--text:#0f172a;--text2:#475569;--border:#e2e8f0;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--sw:260px;--font:'Sarabun',sans-serif;}
body{font-family:var(--font);background:var(--bg);color:var(--text);min-height:100vh;display:flex;}
.sidebar{width:var(--sw);min-height:100vh;background:var(--sidebar-bg);border-right:1px solid var(--border);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03);}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px;}
.sb-logo img{height:38px;}
.sb-logo-text .t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px;}
.sb-logo-text .t2{font-size:10.5px;color:var(--text2);}
.admin-badge{font-size:9.5px;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:2px 7px;border-radius:20px;font-weight:700;letter-spacing:.5px;margin-top:2px;display:inline-block;}
.sb-nav{flex:1;padding:14px 10px;overflow-y:auto;}
.nav-lbl{font-size:10.5px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:1.2px;padding:10px 12px 6px;}
.nav-a{display:flex;align-items:center;gap:11px;padding:10px 13px;border-radius:10px;color:var(--text2);text-decoration:none;font-size:14px;font-weight:500;transition:all .2s;margin-bottom:2px;cursor:pointer;border:none;background:none;width:100%;}
.nav-a:hover{background:var(--card-h);color:var(--text);}
.nav-a.active{background:linear-gradient(135deg,rgba(79,142,247,0.18),rgba(124,58,237,0.18));color:var(--accent);border:1px solid rgba(79,142,247,0.28);}
.nav-a i{width:18px;text-align:center;font-size:15px;}
.sb-user{padding:14px 18px;border-top:1px solid var(--border);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#ef4444);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0;}
.u-name{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.u-role{font-size:10.5px;color:#fbbf24;}
.logout-btn{background:none;border:none;color:var(--text2);cursor:pointer;padding:5px;font-size:15px;margin-left:auto;}
.logout-btn:hover{color:var(--danger);}
.main{margin-left:var(--sw);flex:1;padding:30px 32px;background:radial-gradient(ellipse at 10% 10%,rgba(59,130,246,0.04) 0%,transparent 50%),radial-gradient(ellipse at 90% 90%,rgba(139,92,246,0.04) 0%,transparent 50%),var(--bg);}
.page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:26px;}
.page-title{font-size:24px;font-weight:700;}
.page-sub{font-size:13px;color:var(--text2);margin-top:3px;}
.stats-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:14px;margin-bottom:24px;}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:15px;padding:18px;transition:all .3s;position:relative;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.03);}
.stat-card:hover{background:var(--card-h);transform:translateY(-3px);box-shadow:0 12px 32px rgba(0,0,0,0.08);}
.stat-ico{width:40px;height:40px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:16px;margin-bottom:12px;}
.stat-val{font-size:28px;font-weight:800;color:var(--text);}
.stat-lbl{font-size:12px;color:var(--text2);margin-top:2px;}
.charts-row{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px;}
.chart-card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:22px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);}
.chart-title{font-size:14px;font-weight:700;margin-bottom:16px;display:flex;align-items:center;gap:8px;}
.chart-wrap{position:relative;height:220px;display:flex;justify-content:center;}
.card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;flex-wrap:wrap;gap:10px;}
.card-title{font-size:16px;font-weight:700;}
.filter-row{display:flex;gap:8px;flex-wrap:wrap;align-items:center;}
.filter-inp{background:#f1f5f9;border:1px solid #cbd5e1;border-radius:9px;padding:8px 13px;color:var(--text);font-family:var(--font);font-size:13px;outline:none;}
.filter-inp:focus{border-color:var(--accent);background:#ffffff;}
select.filter-inp option{background:#ffffff;color:var(--text);}
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead th{padding:11px 14px;text-align:left;font-size:11.5px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--border);white-space:nowrap;}
tbody td{padding:13px 14px;font-size:13.5px;color:var(--text);border-bottom:1px solid var(--border);}
tbody tr:hover{background:var(--card-h);}
tbody tr:last-child td{border-bottom:none;}
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;white-space:nowrap;}
.badge-pending{background:rgba(245,158,11,0.14);color:#fbbf24;border:1px solid rgba(245,158,11,0.28);}
.badge-approved{background:rgba(16,185,129,0.14);color:#34d399;border:1px solid rgba(16,185,129,0.28);}
.badge-rejected{background:rgba(239,68,68,0.14);color:#f87171;border:1px solid rgba(239,68,68,0.28);}
.btn{display:inline-flex;align-items:center;gap:6px;padding:7px 14px;border-radius:8px;font-family:var(--font);font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:all .2s;text-decoration:none;}
.btn-view{background:rgba(79,142,247,0.15);color:#93c5fd;border:1px solid rgba(79,142,247,0.28);}
.btn-view:hover{background:rgba(79,142,247,0.25);}
.truncate{max-width:150px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.empty-state{text-align:center;padding:40px;color:var(--text2);}
.empty-state i{font-size:40px;margin-bottom:12px;opacity:.3;}
.loading-overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:999;gap:16px;}
.loading-overlay .spin{width:44px;height:44px;border:3px solid rgba(79,142,247,0.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
</style>
</head>
<body>
<div class="loading-overlay" id="loadingOverlay"><div class="spin"></div><p style="color:var(--text2)">กำลังโหลด...</p></div>

<aside class="sidebar">
  <div class="sb-logo">
    <img src="/bicc-ovec/assets/logo.png" alt="logo" onerror="this.style.display='none'">
    <div class="sb-logo-text">
      <div class="t1">BICC OVEC</div>
      <div class="admin-badge">ADMIN</div>
    </div>
  </div>
  <nav class="sb-nav">
    <div class="nav-lbl">ผู้ดูแลระบบ</div>
    <a class="nav-a active" href="/bicc-ovec/admin/dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
    <a class="nav-a" href="/bicc-ovec/admin/users.php"><i class="fas fa-users"></i> จัดการผู้ใช้</a>
    <div class="nav-lbl" style="margin-top:8px;">บัญชี</div>
    <button class="nav-a" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-user">
    <div class="avatar" id="sbAvatar" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">A</div>
    <div style="flex:1;min-width:0;"><div class="u-name" id="sbName">Admin</div><div class="u-role">ผู้ดูแลระบบ</div></div>
    <button class="logout-btn" onclick="doLogout()"><i class="fas fa-power-off"></i></button>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <div>
      <div class="page-title">📊 Admin Dashboard</div>
      <div class="page-sub" id="dateLabel"></div>
    </div>
  </div>

  <!-- Stats -->
  <div class="stats-grid">
    <div class="stat-card"><div class="stat-ico" style="background:rgba(79,142,247,0.15);color:#4f8ef7;"><i class="fas fa-list-alt"></i></div><div class="stat-val" id="stAll">—</div><div class="stat-lbl">รายการทั้งหมด</div></div>
    <div class="stat-card"><div class="stat-ico" style="background:rgba(245,158,11,0.15);color:#f59e0b;"><i class="fas fa-clock"></i></div><div class="stat-val" id="stPend">—</div><div class="stat-lbl">รออนุมัติ</div></div>
    <div class="stat-card"><div class="stat-ico" style="background:rgba(16,185,129,0.15);color:#10b981;"><i class="fas fa-check-circle"></i></div><div class="stat-val" id="stAppr">—</div><div class="stat-lbl">อนุมัติแล้ว</div></div>
    <div class="stat-card"><div class="stat-ico" style="background:rgba(239,68,68,0.15);color:#ef4444;"><i class="fas fa-times-circle"></i></div><div class="stat-val" id="stRej">—</div><div class="stat-lbl">ปฏิเสธ</div></div>
    <div class="stat-card"><div class="stat-ico" style="background:rgba(6,182,212,0.15);color:#06b6d4;"><i class="fas fa-users"></i></div><div class="stat-val" id="stUsers">—</div><div class="stat-lbl">ผู้ใช้งาน</div></div>
  </div>

  <!-- Charts -->
  <div class="charts-row">
    <div class="chart-card">
      <div class="chart-title"><i class="fas fa-chart-pie" style="color:var(--accent)"></i> สัดส่วนประเภทการไปราชการ</div>
      <div class="chart-wrap"><canvas id="typeChart"></canvas></div>
    </div>
    <div class="chart-card">
      <div class="chart-title"><i class="fas fa-chart-donut" style="color:var(--accent2)"></i> สัดส่วนสถานะการอนุมัติ</div>
      <div class="chart-wrap"><canvas id="statusChart"></canvas></div>
    </div>
    <div class="chart-card">
      <div class="chart-title"><i class="fas fa-users" style="color:#f59e0b"></i> ผู้ที่ไปราชการยอดนิยมสูงสุด</div>
      <div class="chart-wrap"><canvas id="personChart"></canvas></div>
    </div>
    <div class="chart-card">
      <div class="chart-title"><i class="fas fa-calendar-alt" style="color:#10b981"></i> เปรียบเทียบงบประมาณตามปี</div>
      <div class="chart-wrap"><canvas id="yearChart"></canvas></div>
    </div>
  </div>

  <!-- Table -->
  <div class="card">
    <div class="card-header">
      <div class="card-title"><i class="fas fa-table" style="color:var(--accent)"></i> รายการทั้งหมด</div>
      <div class="filter-row">
        <select id="filterYear" class="filter-inp" onchange="applyFilter()">
          <option value="2567">2567</option>
          <option value="2568">2568</option>
          <option value="2569" selected>2569</option>
          <option value="2570">2570</option>
          <option value="2571">2571</option>
          <option value="2572">2572</option>
          <option value="">ทุกปีงบประมาณ</option>
        </select>
        <button class="btn btn-primary" onclick="exportExcel()" style="margin-right:8px;"><i class="fas fa-file-excel"></i> Export Excel</button>
        <input type="text" id="searchInp" class="filter-inp" placeholder="🔍 ค้นหา..." oninput="applyFilter()" style="width:180px;">
        <select id="filterStatus" class="filter-inp" onchange="applyFilter()">
          <option value="">ทุกสถานะ</option>
          <option value="pending">รออนุมัติ</option>
          <option value="approved">อนุมัติแล้ว</option>
          <option value="rejected">ปฏิเสธ</option>
        </select>
        <select id="filterType" class="filter-inp" onchange="applyFilter()">
          <option value="">ทุกประเภท</option>
          <option>อบรม</option><option>ประชุม</option><option>ดูงาน</option><option>สัมมนา</option><option>แข่งขัน</option><option>อื่นๆ</option>
        </select>
      </div>
    </div>
    <div class="tbl-wrap">
      <table>
        <thead><tr><th>ที่</th><th>ผู้ไปราชการ</th><th>หน่วยงาน</th><th>เรื่องที่ไป</th><th>ปีงบ</th><th>ประเภท</th><th>วันที่ไป</th><th>เงินเบิก</th><th>สถานะ</th><th>จัดการ</th></tr></thead>
        <tbody id="adminTbody"><tr><td colspan="10"><div class="empty-state"><i class="fas fa-spinner fa-spin"></i><p>กำลังโหลด...</p></div></td></tr></tbody>
      </table>
    </div>
  </div>
</main>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, onAuthStateChanged, signOut } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc, collection, getDocs, query, orderBy, getCountFromServer } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);
let allTravels=[], typeChartInst=null, statusChartInst=null, personChartInst=null, yearChartInst=null;

document.getElementById('dateLabel').textContent=new Date().toLocaleDateString('th-TH',{weekday:'long',year:'numeric',month:'long',day:'numeric'});

const chartDefaults={plugins:{legend:{position:'right',labels:{color:'#475569',font:{family:'Sarabun',size:12},padding:14,boxWidth:12,boxHeight:12}}},layout:{padding:10}};

onAuthStateChanged(auth, async user=>{
  if(!user){window.location.href='/bicc-ovec/login.php';return;}
  const snap=await getDoc(doc(db,'users',user.uid));
  if(!snap.exists()||snap.data().role!=='admin'){window.location.href='/bicc-ovec/user/dashboard.php';return;}
  const ud=snap.data();
  document.getElementById('sbName').textContent=ud.displayName||user.email;
  document.getElementById('sbAvatar').textContent=(ud.displayName||'A').charAt(0).toUpperCase();
  await loadAll();
  document.getElementById('loadingOverlay').style.display='none';
});

async function loadAll(){
  const [tSnap,uSnap]=await Promise.all([
    getDocs(query(collection(db,'travels'),orderBy('createdAt','desc'))),
    getDocs(collection(db,'users'))
  ]);
  allTravels=tSnap.docs.map(d=>{
    const dat = d.data();
    if(!dat.fiscalYear) dat.fiscalYear = '2569';
    return {id:d.id,...dat};
  });
  const userCount=uSnap.docs.filter(d=>d.data().role==='user').length;
  document.getElementById('stUsers').textContent=userCount;
  
  applyFilter();
}

function updateStats(data){
  document.getElementById('stAll').textContent=data.length;
  document.getElementById('stPend').textContent=data.filter(t=>t.status==='pending').length;
  document.getElementById('stAppr').textContent=data.filter(t=>t.status==='approved').length;
  document.getElementById('stRej').textContent=data.filter(t=>t.status==='rejected').length;
}

function drawCharts(data){
  const colors=['#4f8ef7','#7c3aed','#06b6d4','#10b981','#f59e0b','#ef4444'];
  // Type chart
  const typeMap={};
  data.forEach(t=>{if(t.travelType)typeMap[t.travelType]=(typeMap[t.travelType]||0)+1;});
  if(typeChartInst) typeChartInst.destroy();
  typeChartInst=new Chart(document.getElementById('typeChart'),{type:'pie',data:{labels:Object.keys(typeMap),datasets:[{data:Object.values(typeMap),backgroundColor:colors,borderColor:'#ffffff',borderWidth:2}]},options:{...chartDefaults,responsive:true,maintainAspectRatio:true}});
  // Status chart
  const pending=data.filter(t=>t.status==='pending').length;
  const approved=data.filter(t=>t.status==='approved').length;
  const rejected=data.filter(t=>t.status==='rejected').length;
  if(statusChartInst) statusChartInst.destroy();
  statusChartInst=new Chart(document.getElementById('statusChart'),{type:'doughnut',data:{labels:['รออนุมัติ','อนุมัติแล้ว','ปฏิเสธ'],datasets:[{data:[pending,approved,rejected],backgroundColor:['#f59e0b','#10b981','#ef4444'],borderColor:'#ffffff',borderWidth:2}]},options:{...chartDefaults,responsive:true,maintainAspectRatio:true}});
  
  // Person chart (Top 10)
  const pMap={};
  data.forEach(t=>{if(t.travelerName)pMap[t.travelerName]=(pMap[t.travelerName]||0)+1;});
  const pSort = Object.entries(pMap).sort((a,b)=>b[1]-a[1]).slice(0, 10);
  if(personChartInst) personChartInst.destroy();
  personChartInst=new Chart(document.getElementById('personChart'),{type:'bar',data:{labels:pSort.map(v=>v[0]),datasets:[{label:'จำนวนครั้ง',data:pSort.map(v=>v[1]),backgroundColor:'#3b82f6',borderRadius:6}]},options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{stepSize:1}}},responsive:true,maintainAspectRatio:true}});

  // Year chart (All travels regardless of year filter)
  const yMap={};
  allTravels.forEach(t=>{yMap[t.fiscalYear]=(yMap[t.fiscalYear]||0)+1;});
  const ySort = Object.entries(yMap).sort((a,b)=>a[0].localeCompare(b[0]));
  if(yearChartInst) yearChartInst.destroy();
  yearChartInst=new Chart(document.getElementById('yearChart'),{type:'bar',data:{labels:ySort.map(v=>v[0]),datasets:[{label:'จำนวนรายการสะสม',data:ySort.map(v=>v[1]),backgroundColor:'#10b981',borderRadius:6}]},options:{plugins:{legend:{display:false}},scales:{y:{beginAtZero:true,ticks:{stepSize:1}}},responsive:true,maintainAspectRatio:true}});
}

function renderTable(data){
  const tbody=document.getElementById('adminTbody');
  if(!data.length){tbody.innerHTML='<tr><td colspan="10"><div class="empty-state"><i class="fas fa-inbox"></i><p>ไม่พบรายการ</p></div></td></tr>';return;}
  const bMap={pending:'<span class="badge badge-pending"><i class="fas fa-clock"></i> รออนุมัติ</span>',approved:'<span class="badge badge-approved"><i class="fas fa-check"></i> อนุมัติ</span>',rejected:'<span class="badge badge-rejected"><i class="fas fa-times"></i> ปฏิเสธ</span>'};
  tbody.innerHTML=data.map(t=>`<tr>
    <td><b>${t.itemNumber||'-'}</b></td>
    <td>${t.travelerName||'-'}</td>
    <td><div class="truncate">${t.department||'-'}</div></td>
    <td><div class="truncate">${t.subject||'-'}</div></td>
    <td><span style="font-size:12px;color:var(--accent);font-weight:600">${t.fiscalYear||'2569'}</span></td>
    <td><span style="font-size:12px;color:var(--text2)">${t.travelType||'-'}</span></td>
    <td>${t.startDate||'-'}</td>
    <td style="font-weight:700;color:var(--accent)">฿${Number(t.totalAmount||0).toLocaleString()}</td>
    <td>${bMap[t.status]||'-'}</td>
    <td><a href="/bicc-ovec/admin/travel_detail.php?id=${t.id}" class="btn btn-view"><i class="fas fa-eye"></i> ดู</a></td>
  </tr>`).join('');
}

window.applyFilter=function(){
  const q=document.getElementById('searchInp').value.toLowerCase();
  const s=document.getElementById('filterStatus').value;
  const tp=document.getElementById('filterType').value;
  const y=document.getElementById('filterYear').value;
  const f=allTravels.filter(t=>{
    const m=(t.travelerName||'').toLowerCase().includes(q)||(t.subject||'').toLowerCase().includes(q)||(t.department||'').toLowerCase().includes(q);
    const ms=!s||t.status===s;
    const mt=!tp||t.travelType===tp;
    const my=!y||t.fiscalYear===y;
    return m&&ms&&mt&&my;
  });
  updateStats(f);
  drawCharts(f);
  renderTable(f);
};

window.exportExcel=function(){
  const q=document.getElementById('searchInp').value.toLowerCase();
  const s=document.getElementById('filterStatus').value;
  const tp=document.getElementById('filterType').value;
  const y=document.getElementById('filterYear').value;
  
  const f=allTravels.filter(t=>{
    const m=(t.travelerName||'').toLowerCase().includes(q)||(t.subject||'').toLowerCase().includes(q)||(t.department||'').toLowerCase().includes(q);
    const ms=!s||t.status===s;
    const mt=!tp||t.travelType===tp;
    const my=!y||t.fiscalYear===y;
    return m&&ms&&mt&&my;
  });
  
  const formatted = f.map((t, idx)=>({
    'ลำดับ': idx+1,
    'ที่รายการ': t.itemNumber||'-',
    'ปีงบประมาณ': t.fiscalYear||'2569',
    'ชื่อ-สกุล': t.travelerName||'-',
    'ตำแหน่ง': t.position||'-',
    'หน่วยงาน': t.department||'-',
    'เรื่องที่ไป': t.subject||'-',
    'ประเภท': t.travelType||'-',
    'สถานที่': t.location||'-',
    'ตั้งแต่วันที่': t.startDate||'-',
    'ถึงวันที่': t.endDate||'-',
    'ยอดเงินที่เบิก': t.totalAmount||0,
    'แหล่งเงิน': t.fundSource==='college'?'จากวิทยาลัย':'จากโครงการ'+(t.fundDetail?' '+t.fundDetail:''),
    'สถานะ': t.status==='approved'?'อนุมัติแล้ว':(t.status==='rejected'?'ปฏิเสธ':'รออนุมัติ')
  }));
  const ws = XLSX.utils.json_to_sheet(formatted);
  const wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "Travels");
  XLSX.writeFile(wb, `travel_report_${y||'all'}.xlsx`);
};

window.doLogout=async function(){await signOut(auth);window.location.href='/bicc-ovec/login.php';};
</script>
</body>
</html>
