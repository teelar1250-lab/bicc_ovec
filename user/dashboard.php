<?php $pageTitle = "Dashboard — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--bg2:#ffffff;--sidebar-bg:#ffffff;--card:#ffffff;--card-h:#f1f5f9;--accent:#3b82f6;--accent2:#8b5cf6;--teal:#0ea5e9;--text:#0f172a;--text2:#475569;--border:#e2e8f0;--success:#10b981;--warning:#f59e0b;--danger:#ef4444;--sw:260px;--font:'Sarabun',sans-serif;}
body{font-family:var(--font);background:var(--bg);color:var(--text);min-height:100vh;display:flex;}
/* Sidebar */
.sidebar{width:var(--sw);min-height:100vh;background:var(--sidebar-bg);border-right:1px solid var(--border);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03);}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px;}
.sb-logo img{height:38px;}
.sb-logo-text .t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px;}
.sb-logo-text .t2{font-size:10.5px;color:var(--text2);margin-top:1px;}
.sb-nav{flex:1;padding:14px 10px;overflow-y:auto;}
.nav-lbl{font-size:10.5px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:1.2px;padding:10px 12px 6px;}
.nav-a{display:flex;align-items:center;gap:11px;padding:10px 13px;border-radius:10px;color:var(--text2);text-decoration:none;font-size:14px;font-weight:500;transition:all .2s;margin-bottom:2px;cursor:pointer;border:none;background:none;width:100%;}
.nav-a:hover{background:var(--card-h);color:var(--text);}
.nav-a.active{background:linear-gradient(135deg,rgba(79,142,247,0.18),rgba(124,58,237,0.18));color:var(--accent);border:1px solid rgba(79,142,247,0.28);}
.nav-a i{width:18px;text-align:center;font-size:15px;}
.sb-user{padding:14px 18px;border-top:1px solid var(--border);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0;}
.u-info{flex:1;min-width:0;}
.u-name{font-size:13px;font-weight:600;color:var(--text);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.u-role{font-size:10.5px;color:var(--text2);}
.logout-btn{background:none;border:none;color:var(--text2);cursor:pointer;padding:5px;font-size:15px;transition:color .2s;}
.logout-btn:hover{color:var(--danger);}
/* Main */
.main{margin-left:var(--sw);flex:1;min-height:100vh;padding:30px 32px;background:radial-gradient(ellipse at 15% 15%,rgba(59,130,246,0.04) 0%,transparent 50%),radial-gradient(ellipse at 85% 85%,rgba(139,92,246,0.04) 0%,transparent 50%),var(--bg);}
.page-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:26px;}
.page-title{font-size:24px;font-weight:700;}
.page-sub{font-size:13.5px;color:var(--text2);margin-top:3px;}
/* Stats */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:24px;}
.stat-card{background:var(--card);border:1px solid var(--border);border-radius:15px;padding:20px;transition:all .3s;position:relative;overflow:hidden;box-shadow:0 4px 15px rgba(0,0,0,0.03);}
.stat-card::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,transparent,rgba(0,0,0,0.02));pointer-events:none;}
.stat-card:hover{background:var(--card-h);transform:translateY(-3px);box-shadow:0 12px 32px rgba(0,0,0,0.08);}
.stat-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:17px;margin-bottom:14px;}
.stat-val{font-size:30px;font-weight:800;color:var(--text);}
.stat-lbl{font-size:13px;color:var(--text2);margin-top:3px;}
/* Card */
.card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);}
.card-header{display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;}
.card-title{font-size:16px;font-weight:700;}
/* Table */
.tbl-wrap{overflow-x:auto;}
table{width:100%;border-collapse:collapse;}
thead th{padding:11px 14px;text-align:left;font-size:11.5px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--border);white-space:nowrap;}
tbody td{padding:13px 14px;font-size:13.5px;color:var(--text);border-bottom:1px solid var(--border);}
tbody tr:hover{background:var(--card-h);}
tbody tr:last-child td{border-bottom:none;}
/* Badges */
.badge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:600;white-space:nowrap;}
.badge-pending{background:rgba(245,158,11,0.14);color:#fbbf24;border:1px solid rgba(245,158,11,0.28);}
.badge-approved{background:rgba(16,185,129,0.14);color:#34d399;border:1px solid rgba(16,185,129,0.28);}
.badge-rejected{background:rgba(239,68,68,0.14);color:#f87171;border:1px solid rgba(239,68,68,0.28);}
/* Buttons */
.btn{display:inline-flex;align-items:center;gap:7px;padding:9px 18px;border-radius:10px;font-family:var(--font);font-size:14px;font-weight:600;cursor:pointer;border:none;transition:all .2s;text-decoration:none;}
.btn-primary{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(79,142,247,0.38);}
.btn-sm{padding:6px 12px;font-size:12.5px;border-radius:8px;}
.btn-ghost{background:transparent;border:1px solid var(--border);color:var(--text2);}
.btn-ghost:hover{background:var(--card-h);color:var(--text);}
.btn-teal{background:rgba(6,182,212,0.15);color:#22d3ee;border:1px solid rgba(6,182,212,0.28);}
.btn-teal:hover{background:rgba(6,182,212,0.25);}
/* Loading */
.loading-overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:999;gap:16px;}
.loading-overlay .spin{width:44px;height:44px;border:3px solid rgba(79,142,247,0.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
.loading-overlay p{color:var(--text2);font-size:15px;}
.empty-state{text-align:center;padding:50px 20px;color:var(--text2);}
.empty-state i{font-size:48px;margin-bottom:14px;opacity:.3;}
.empty-state p{font-size:15px;}
.actions-col{display:flex;gap:6px;align-items:center;}
.truncate{max-width:160px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
/* Warning Modal */
.warn-modal{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.6);z-index:9999;align-items:center;justify-content:center;padding:20px;backdrop-filter:blur(4px);}
.warn-modal.show{display:flex;animation:fadeIn .3s ease;}
.warn-box{background:var(--bg2);width:100%;max-width:440px;border-radius:20px;padding:32px;text-align:center;box-shadow:0 25px 50px rgba(0,0,0,0.15);position:relative;animation:slideUp .3s ease;}
@keyframes fadeIn{from{opacity:0;}to{opacity:1;}}
@keyframes slideUp{from{transform:translateY(30px);opacity:0;}to{transform:translateY(0);opacity:1;}}
.warn-icon{width:70px;height:70px;background:rgba(245,158,11,0.15);color:#f59e0b;font-size:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 20px;}
.warn-title{font-size:20px;font-weight:700;color:var(--text);margin-bottom:10px;}
.warn-desc{font-size:14.5px;color:var(--text2);margin-bottom:24px;line-height:1.6;}
.warn-close{width:100%;padding:12px;background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;border:none;border-radius:12px;font-size:15px;font-weight:700;font-family:var(--font);cursor:pointer;transition:all .2s;}
.warn-close:hover{box-shadow:0 8px 20px rgba(59,130,246,0.3);transform:translateY(-2px);}
</style>
</head>
<body>

<!-- Loading Overlay -->
<div class="loading-overlay" id="loadingOverlay">
  <div class="spin"></div><p>กำลังโหลด...</p>
</div>

<!-- Sidebar -->
<aside class="sidebar">
  <div class="sb-logo">
    <img src="/bicc-ovec/assets/logo.png" alt="logo" onerror="this.style.display='none'">
    <div class="sb-logo-text"><div class="t1">BICC OVEC</div><div class="t2">ระบบไปราชการ</div></div>
  </div>
  <nav class="sb-nav">
    <div class="nav-lbl">เมนูหลัก</div>
    <a class="nav-a active" href="/bicc-ovec/user/dashboard.php"><i class="fas fa-home"></i> หน้าหลัก</a>
    <a class="nav-a" href="/bicc-ovec/user/travel_form.php"><i class="fas fa-plus-circle"></i> เพิ่มการไปราชการ</a>
    <div class="nav-lbl" style="margin-top:8px;">บัญชีของฉัน</div>
    <button class="nav-a" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-user">
    <div class="avatar" id="sbAvatar">?</div>
    <div class="u-info">
      <div class="u-name" id="sbName">กำลังโหลด...</div>
      <div class="u-role">ผู้ใช้งาน</div>
    </div>
    <button class="logout-btn" onclick="doLogout()" title="ออกจากระบบ"><i class="fas fa-power-off"></i></button>
  </div>
</aside>

<!-- Main Content -->
<main class="main">
  <div class="page-header">
    <div>
      <div class="page-title">📋 รายการการไปราชการของฉัน</div>
      <div class="page-sub" id="dateLabel"></div>
    </div>
    <a href="/bicc-ovec/user/travel_form.php" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มรายการใหม่</a>
  </div>

  <!-- Stats -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="stat-ico" style="background:rgba(79,142,247,0.15);color:#4f8ef7;"><i class="fas fa-list-alt"></i></div>
      <div class="stat-val" id="statAll">—</div>
      <div class="stat-lbl">รายการทั้งหมด</div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:rgba(245,158,11,0.15);color:#f59e0b;"><i class="fas fa-clock"></i></div>
      <div class="stat-val" id="statPending">—</div>
      <div class="stat-lbl">รออนุมัติ</div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:rgba(16,185,129,0.15);color:#10b981;"><i class="fas fa-check-circle"></i></div>
      <div class="stat-val" id="statApproved">—</div>
      <div class="stat-lbl">อนุมัติแล้ว</div>
    </div>
    <div class="stat-card">
      <div class="stat-ico" style="background:rgba(6,182,212,0.15);color:#06b6d4;"><i class="fas fa-paperclip"></i></div>
      <div class="stat-val" id="statDocs">—</div>
      <div class="stat-lbl">ไฟล์ที่อัปโหลด</div>
    </div>
  </div>

  <!-- Table -->
  <div class="card">
    <div class="card-header">
      <div class="card-title"><i class="fas fa-table" style="color:var(--accent)"></i> รายการของฉัน</div>
      <div style="display:flex;gap:8px;align-items:center;">
        <select id="filterYear" style="background:#f1f5f9;border:1px solid var(--border);border-radius:9px;padding:8px 13px;color:var(--text);font-family:var(--font);font-size:13.5px;outline:none;" onchange="filterTable()">
          <option value="2567">2567</option>
          <option value="2568">2568</option>
          <option value="2569" selected>2569</option>
          <option value="2570">2570</option>
          <option value="2571">2571</option>
          <option value="2572">2572</option>
          <option value="">ทุกปีงบประมาณ</option>
        </select>
        <input type="text" id="searchInp" placeholder="🔍 ค้นหา..." style="background:#f1f5f9;border:1px solid var(--border);border-radius:9px;padding:8px 13px;color:var(--text);font-family:var(--font);font-size:13.5px;outline:none;width:160px;" oninput="filterTable()">
      </div>
    </div>
    <div class="tbl-wrap">
      <table>
        <thead>
          <tr>
            <th>ที่</th>
            <th>เรื่องที่ไป</th>
            <th>สถานที่</th>
            <th>วันที่ไป</th>
            <th>วันที่กลับ</th>
            <th>ประเภท</th>
            <th>สถานะ</th>
            <th>จัดการ</th>
          </tr>
        </thead>
        <tbody id="travelTbody">
          <tr><td colspan="8"><div class="empty-state"><i class="fas fa-spinner fa-spin"></i><p>กำลังโหลด...</p></div></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</main>

<div class="warn-modal" id="warnModal">
  <div class="warn-box">
    <div class="warn-icon"><i class="fas fa-bullhorn"></i></div>
    <div class="warn-title">แจ้งเตือนบันทึกเอกสาร!</div>
    <div class="warn-desc">คุณมีรายการไปราชการที่เดินทางกลับมาแล้ว<br>กรุณาแนบลิงก์เอกสารรายงานภายในกำหนดเวลา</div>
    <button class="warn-close" onclick="document.getElementById('warnModal').classList.remove('show')">รับทราบ</button>
  </div>
</div>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, onAuthStateChanged, signOut } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc, collection, query, where, orderBy, getDocs, getCountFromServer } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);

let allTravels = [];

document.getElementById('dateLabel').textContent = new Date().toLocaleDateString('th-TH',{weekday:'long',year:'numeric',month:'long',day:'numeric'});

onAuthStateChanged(auth, async user => {
  if(!user){ window.location.href='/bicc-ovec/login.php'; return; }
  const snap = await getDoc(doc(db,'users',user.uid));
  if(!snap.exists()){ await signOut(auth); window.location.href='/bicc-ovec/login.php'; return; }
  const ud = snap.data();
  document.getElementById('sbName').textContent = ud.displayName || user.email;
  document.getElementById('sbAvatar').textContent = (ud.displayName||'U').charAt(0).toUpperCase();
  document.getElementById('loadingOverlay').style.display='none';
  loadTravels(user.uid);
});

async function loadTravels(uid){
  try {
    const q = query(collection(db,'travels'), where('userId','==',uid));
    const snap = await getDocs(q);
    allTravels = snap.docs.map(d=>{
      const docData = d.data();
      if(!docData.fiscalYear) docData.fiscalYear = '2569';
      return {id:d.id,...docData};
    });
    
    // Sort by createdAt descending in JS to avoid requiring a composite index in Firestore
    allTravels.sort((a, b) => {
      const aTime = a.createdAt?.toMillis ? a.createdAt.toMillis() : 0;
      const bTime = b.createdAt?.toMillis ? b.createdAt.toMillis() : 0;
      return bTime - aTime;
    });

    filterTable();
  } catch(e){ console.error(e); }
}

async function updateStats(data = []){
  const all = data.length;
  const pending = data.filter(t=>t.status==='pending').length;
  const approved = data.filter(t=>t.status==='approved').length;
  document.getElementById('statAll').textContent = all;
  document.getElementById('statPending').textContent = pending;
  document.getElementById('statApproved').textContent = approved;
  // Count docs & Check Warning
  let dc = 0;
  let showWarn = false;
  const today = new Date();
  today.setHours(0,0,0,0);
  
  for(const t of data){
    try{
      const ds = await getDocs(collection(db,'travels',t.id,'documents'));
      dc += ds.size;
      
      // Warning logic: approved travel, end date is passed, within 5 days, and no docs yet.
      if(t.status === 'approved' && t.endDate) {
        const edParts = t.endDate.split('-');
        if(edParts.length===3) {
          const edDate = new Date(edParts[0], edParts[1]-1, edParts[2]);
          edDate.setHours(0,0,0,0);
          const diffDays = Math.floor((today - edDate)/(1000*60*60*24));
          if(diffDays >= 0 && diffDays <= 5 && ds.size === 0) {
            showWarn = true;
          }
        }
      }
    }catch(e){}
  }
  document.getElementById('statDocs').textContent = dc;
  if(showWarn && !sessionStorage.getItem('warnShown')){
    document.getElementById('warnModal').classList.add('show');
    sessionStorage.setItem('warnShown', '1');
  }
}

function renderTable(data){
  const tbody = document.getElementById('travelTbody');
  if(!data.length){
    tbody.innerHTML = `<tr><td colspan="8"><div class="empty-state"><i class="fas fa-inbox"></i><p>ยังไม่มีรายการการไปราชการ<br><a href="/bicc-ovec/user/travel_form.php" style="color:var(--accent);font-weight:700;">+ เพิ่มรายการแรก</a></p></div></td></tr>`;
    return;
  }
  const badgeMap = {pending:'<span class="badge badge-pending"><i class="fas fa-clock"></i> รออนุมัติ</span>',approved:'<span class="badge badge-approved"><i class="fas fa-check"></i> อนุมัติแล้ว</span>',rejected:'<span class="badge badge-rejected"><i class="fas fa-times"></i> ปฏิเสธ</span>'};
  tbody.innerHTML = data.map(t=>`
    <tr>
      <td><b>${t.itemNumber||'-'}</b></td>
      <td><div class="truncate" title="${t.subject||''}">${t.subject||'-'}</div></td>
      <td><div class="truncate" title="${t.location||''}">${t.location||'-'}</div></td>
      <td>${t.startDate||'-'}</td>
      <td>${t.endDate||'-'}</td>
      <td><span style="font-size:12px;color:var(--text2);">${t.travelType||'-'}</span></td>
      <td>${badgeMap[t.status]||'-'}</td>
      <td>
        <div class="actions-col">
          <a href="/bicc-ovec/user/travel_detail.php?id=${t.id}" class="btn btn-ghost btn-sm" title="ดูรายละเอียด"><i class="fas fa-eye"></i></a>
          ${t.status==='pending'?`<a href="/bicc-ovec/user/travel_form.php?id=${t.id}" class="btn btn-ghost btn-sm" title="แก้ไข"><i class="fas fa-edit"></i></a>`:''}
          <a href="/bicc-ovec/user/upload.php?id=${t.id}" class="btn btn-teal btn-sm" title="อัปโหลดเอกสาร"><i class="fas fa-upload"></i></a>
        </div>
      </td>
    </tr>
  `).join('');
}

window.filterTable = function(){
  const q = document.getElementById('searchInp').value.toLowerCase();
  const y = document.getElementById('filterYear').value;
  const filtered = allTravels.filter(t=>{
    const matchSearch = (t.subject||'').toLowerCase().includes(q)||(t.location||'').toLowerCase().includes(q)||(t.travelType||'').toLowerCase().includes(q);
    const matchYear = !y || t.fiscalYear === y;
    return matchSearch && matchYear;
  });
  updateStats(filtered);
  renderTable(filtered);
};

window.doLogout = async function(){
  await signOut(auth);
  window.location.href='/bicc-ovec/login.php';
};
</script>
</body>
</html>
