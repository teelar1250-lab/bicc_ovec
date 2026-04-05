<?php $pageTitle = "รายละเอียดการไปราชการ — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sidebar-bg:#ffffff;--card:#ffffff;--card-h:#f1f5f9;--accent:#3b82f6;--accent2:#8b5cf6;--teal:#0ea5e9;--text:#0f172a;--text2:#475569;--border:#e2e8f0;--danger:#ef4444;--success:#10b981;--warning:#f59e0b;--sw:260px;--font:'Sarabun',sans-serif;}
body{font-family:var(--font);background:var(--bg);color:var(--text);min-height:100vh;display:flex;}
.sidebar{width:var(--sw);min-height:100vh;background:var(--sidebar-bg);border-right:1px solid var(--border);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03);}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px;}
.sb-logo img{height:38px;}
.sb-logo-text .t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px;}
.sb-logo-text .t2{font-size:10.5px;color:var(--text2);}
.sb-nav{flex:1;padding:14px 10px;}
.nav-lbl{font-size:10.5px;font-weight:700;color:var(--text2);text-transform:uppercase;letter-spacing:1.2px;padding:10px 12px 6px;}
.nav-a{display:flex;align-items:center;gap:11px;padding:10px 13px;border-radius:10px;color:var(--text2);text-decoration:none;font-size:14px;font-weight:500;transition:all .2s;margin-bottom:2px;cursor:pointer;border:none;background:none;width:100%;}
.nav-a:hover{background:var(--card-h);color:var(--text);}
.nav-a i{width:18px;text-align:center;font-size:15px;}
.sb-user{padding:14px 18px;border-top:1px solid var(--border);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0;}
.u-name{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.u-role{font-size:10.5px;color:var(--text2);}
.logout-btn{background:none;border:none;color:var(--text2);cursor:pointer;padding:5px;font-size:15px;margin-left:auto;}
.logout-btn:hover{color:var(--danger);}
.main{margin-left:var(--sw);flex:1;padding:30px 32px;background:radial-gradient(ellipse at 10% 10%,rgba(59,130,246,0.04) 0%,transparent 50%),var(--bg);}
.page-header{display:flex;align-items:center;gap:14px;margin-bottom:26px;flex-wrap:wrap;}
.back-btn{display:flex;align-items:center;justify-content:center;width:38px;height:38px;background:var(--card);border:1px solid var(--border);border-radius:10px;color:var(--text2);text-decoration:none;font-size:15px;}
.back-btn:hover{background:var(--card-h);color:var(--text);}
.page-title{font-size:22px;font-weight:700;flex:1;}
.badge{display:inline-flex;align-items:center;gap:5px;padding:6px 14px;border-radius:20px;font-size:13px;font-weight:700;}
.badge-pending{background:rgba(245,158,11,0.14);color:#fbbf24;border:1px solid rgba(245,158,11,0.28);}
.badge-approved{background:rgba(16,185,129,0.14);color:#34d399;border:1px solid rgba(16,185,129,0.28);}
.badge-rejected{background:rgba(239,68,68,0.14);color:#f87171;border:1px solid rgba(239,68,68,0.28);}
.card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);margin-bottom:20px;}
.section-title{font-size:14px;font-weight:700;color:var(--accent);margin-bottom:16px;padding-bottom:10px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:8px;}
.detail-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;}
.detail-item .lbl{font-size:12px;font-weight:600;color:var(--text2);margin-bottom:5px;text-transform:uppercase;letter-spacing:.4px;}
.detail-item .val{font-size:14.5px;color:var(--text);font-weight:500;line-height:1.5;}
.detail-item.full{grid-column:1/-1;}
.amt-box{background:#f8fafc;border:1px solid var(--border);border-radius:12px;padding:16px 20px;display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;}
.amt-box .amt-val{font-size:26px;font-weight:800;color:var(--accent);}
.amt-box .amt-lbl{font-size:13px;color:var(--text2);}
.file-item{background:#f8fafc;border:1px solid var(--border);border-radius:12px;padding:13px 16px;display:flex;align-items:center;gap:12px;margin-bottom:10px;}
.file-ico{width:40px;height:40px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:18px;flex-shrink:0;}
.file-ico.img{background:rgba(16,185,129,0.15);color:#34d399;}
.file-ico.pdf{background:rgba(239,68,68,0.15);color:#f87171;}
.file-name{font-size:13.5px;font-weight:600;flex:1;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.file-date{font-size:12px;color:var(--text2);}
.btn-sm{display:inline-flex;align-items:center;gap:5px;padding:7px 13px;border-radius:8px;font-family:var(--font);font-size:12.5px;font-weight:600;cursor:pointer;border:none;text-decoration:none;}
.btn-view{background:rgba(79,142,247,0.15);color:#93c5fd;border:1px solid rgba(79,142,247,0.28);}
.btn-view:hover{background:rgba(79,142,247,0.25);}
.btn-edit{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;}
.btn-edit:hover{opacity:.9;}
.btn-upload-doc{background:rgba(6,182,212,0.15);color:#22d3ee;border:1px solid rgba(6,182,212,0.28);}
.btn-upload-doc:hover{background:rgba(6,182,212,0.25);}
.empty-state{text-align:center;padding:28px;color:var(--text2);}
.empty-state i{font-size:32px;margin-bottom:10px;opacity:.3;}
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.85);z-index:999;align-items:center;justify-content:center;padding:20px;}
.modal-overlay.show{display:flex;}
.modal-box{background:#ffffff;border:1px solid var(--border);border-radius:16px;max-width:900px;width:100%;max-height:90vh;display:flex;flex-direction:column;overflow:hidden;}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid var(--border);}
.modal-close{background:none;border:none;color:var(--text2);cursor:pointer;font-size:18px;padding:4px;}
.modal-body{flex:1;overflow:auto;padding:16px;}
.modal-body img{max-width:100%;border-radius:10px;}
.modal-body iframe{width:100%;height:65vh;border:none;border-radius:8px;}
.loading-overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:998;gap:16px;}
.loading-overlay .spin{width:44px;height:44px;border:3px solid rgba(79,142,247,0.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
</style>
</head>
<body>
<div class="loading-overlay" id="loadingOverlay"><div class="spin"></div><p style="color:var(--text2)">กำลังโหลด...</p></div>

<aside class="sidebar">
  <div class="sb-logo">
    <img src="/bicc-ovec/assets/logo.png" alt="logo" onerror="this.style.display='none'">
    <div class="sb-logo-text"><div class="t1">BICC OVEC</div><div class="t2">ระบบไปราชการ</div></div>
  </div>
  <nav class="sb-nav">
    <div class="nav-lbl">เมนูหลัก</div>
    <a class="nav-a" href="/bicc-ovec/user/dashboard.php"><i class="fas fa-home"></i> หน้าหลัก</a>
    <a class="nav-a" href="/bicc-ovec/user/travel_form.php"><i class="fas fa-plus-circle"></i> เพิ่มการไปราชการ</a>
    <div class="nav-lbl" style="margin-top:8px;">บัญชีของฉัน</div>
    <button class="nav-a" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-user">
    <div class="avatar" id="sbAvatar">?</div>
    <div style="flex:1;min-width:0;"><div class="u-name" id="sbName">กำลังโหลด...</div><div class="u-role">ผู้ใช้งาน</div></div>
    <button class="logout-btn" onclick="doLogout()"><i class="fas fa-power-off"></i></button>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <a href="/bicc-ovec/user/dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
    <div class="page-title">🔍 รายละเอียดการไปราชการ</div>
    <span id="statusBadge"></span>
    <div style="display:flex;gap:8px;flex-wrap:wrap;" id="actionBtns"></div>
  </div>

  <div class="card" id="detailCard" style="display:none">
    <div class="section-title"><i class="fas fa-user"></i> ข้อมูลผู้ไปราชการ</div>
    <div class="detail-grid">
      <div class="detail-item"><div class="lbl">ที่รายการ</div><div class="val" id="dItem">—</div></div>
      <div class="detail-item"><div class="lbl">ชื่อผู้ไปราชการ</div><div class="val" id="dName">—</div></div>
      <div class="detail-item"><div class="lbl">ตำแหน่ง</div><div class="val" id="dPos">—</div></div>
      <div class="detail-item"><div class="lbl">หน่วยงาน</div><div class="val" id="dDept">—</div></div>
      <div class="detail-item"><div class="lbl">ประเภท</div><div class="val" id="dType">—</div></div>
      <div class="detail-item"><div class="lbl">บันทึกเมื่อ</div><div class="val" id="dCreated">—</div></div>
      <div class="detail-item full"><div class="lbl">เรื่องที่ไป</div><div class="val" id="dSubject">—</div></div>
      <div class="detail-item full"><div class="lbl">สถานที่</div><div class="val" id="dLoc">—</div></div>
    </div>
    <div style="height:18px"></div>
    <div class="section-title"><i class="fas fa-calendar-alt"></i> วันที่และงบประมาณ</div>
    <div class="detail-grid" style="margin-bottom:18px;">
      <div class="detail-item"><div class="lbl">วันที่ไป</div><div class="val" id="dStart">—</div></div>
      <div class="detail-item"><div class="lbl">วันที่กลับ</div><div class="val" id="dEnd">—</div></div>
      <div class="detail-item"><div class="lbl">จำนวนวัน</div><div class="val" id="dDays">—</div></div>
    </div>
    <div class="amt-box">
      <div><div class="amt-lbl">จำนวนเงินที่เบิก</div><div class="amt-val" id="dAmt">—</div></div>
      <div style="text-align:right;"><div class="amt-lbl">แหล่งเงิน</div><div style="font-size:15px;font-weight:700;color:var(--text);margin-top:5px;" id="dFund">—</div></div>
    </div>
    <div class="detail-grid">
      <div class="detail-item full"><div class="lbl">หมายเหตุ</div><div class="val" id="dRemark">—</div></div>
    </div>
  </div>

  <div class="card" id="docCard">
    <div class="section-title"><i class="fas fa-paperclip" style="color:var(--teal)"></i> เอกสารที่อัปโหลด (<span id="docCount">0</span> ไฟล์)</div>
    <div id="docList"><div class="empty-state"><i class="fas fa-folder-open"></i><p>ยังไม่มีไฟล์ที่อัปโหลด</p></div></div>
  </div>
</main>

<div class="modal-overlay" id="previewModal">
  <div class="modal-box">
    <div class="modal-header">
      <span id="previewTitle" style="font-size:15px;font-weight:700;"></span>
      <button class="modal-close" onclick="closePreview()"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body" id="previewBody"></div>
  </div>
</div>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, onAuthStateChanged, signOut } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc, collection, getDocs } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);
const params = new URLSearchParams(window.location.search);
const travelId = params.get('id');
if(!travelId){ window.location.href='/bicc-ovec/user/dashboard.php'; }

onAuthStateChanged(auth, async user => {
  if(!user){ window.location.href='/bicc-ovec/login.php'; return; }
  const uSnap = await getDoc(doc(db,'users',user.uid));
  if(!uSnap.exists()){ signOut(auth); return; }
  const ud = uSnap.data();
  document.getElementById('sbName').textContent=ud.displayName||user.email;
  document.getElementById('sbAvatar').textContent=(ud.displayName||'U').charAt(0).toUpperCase();
  const tSnap = await getDoc(doc(db,'travels',travelId));
  if(!tSnap.exists()||tSnap.data().userId!==user.uid){ window.location.href='/bicc-ovec/user/dashboard.php'; return; }
  renderDetail(tSnap.data(), travelId);
  const docsSnap = await getDocs(collection(db,'travels',travelId,'documents'));
  renderDocs(docsSnap.docs.map(d=>({id:d.id,...d.data()})));
  document.getElementById('loadingOverlay').style.display='none';
});

function renderDetail(d, id){
  document.getElementById('detailCard').style.display='block';
  const badgeMap={pending:'<span class="badge badge-pending"><i class="fas fa-clock"></i> รออนุมัติ</span>',approved:'<span class="badge badge-approved"><i class="fas fa-check"></i> อนุมัติแล้ว</span>',rejected:'<span class="badge badge-rejected"><i class="fas fa-times"></i> ปฏิเสธ</span>'};
  document.getElementById('statusBadge').innerHTML=badgeMap[d.status]||'';
  const btns = document.getElementById('actionBtns');
  btns.innerHTML = `<a href="/bicc-ovec/user/upload.php?id=${id}" class="btn-sm btn-upload-doc"><i class="fas fa-upload"></i> อัปโหลดเอกสาร</a>`;
  if(d.status==='pending') btns.innerHTML += ` <a href="/bicc-ovec/user/travel_form.php?id=${id}" class="btn-sm btn-edit"><i class="fas fa-edit"></i> แก้ไข</a>`;
  document.getElementById('dItem').textContent=d.itemNumber||'-';
  document.getElementById('dName').textContent=d.travelerName||'-';
  document.getElementById('dPos').textContent=d.position||'-';
  document.getElementById('dDept').textContent=d.department||'-';
  document.getElementById('dType').textContent=d.travelType||'-';
  document.getElementById('dSubject').textContent=d.subject||'-';
  document.getElementById('dLoc').textContent=d.location||'-';
  document.getElementById('dStart').textContent=d.startDate||'-';
  document.getElementById('dEnd').textContent=d.endDate||'-';
  document.getElementById('dCreated').textContent=d.createdAt?.toDate?d.createdAt.toDate().toLocaleDateString('th-TH'):'-';
  // Days calc
  if(d.startDate&&d.endDate){
    const days=Math.round((new Date(d.endDate)-new Date(d.startDate))/(86400000))+1;
    document.getElementById('dDays').textContent=days+' วัน';
  }
  document.getElementById('dAmt').textContent='฿'+Number(d.totalAmount||0).toLocaleString('th-TH',{minimumFractionDigits:2});
  document.getElementById('dFund').textContent=d.fundSource==='college'?'จากวิทยาลัย':'จากโครงการ'+(d.fundDetail?' ('+d.fundDetail+')':'');
  document.getElementById('dRemark').textContent=d.remark||'—';
}

function renderDocs(docs){
  document.getElementById('docCount').textContent=docs.length;
  if(!docs.length) return;
  document.getElementById('docList').innerHTML=docs.map(d=>{
    const isLink=d.fileType==='link'||(d.fileUrl&&d.fileUrl.includes('drive.google.com'));
    const isPdf=!isLink&&(d.fileType==='application/pdf'||d.fileName?.endsWith('.pdf'));
    const date=d.uploadedAt?.toDate?d.uploadedAt.toDate().toLocaleDateString('th-TH',{year:'numeric',month:'short',day:'numeric'}):'-';
    const icon = isLink?'fa-link':(isPdf?'fa-file-pdf':'fa-file-image');
    const color = isLink?'img':(isPdf?'pdf':'img');
    return `<div class="file-item">
      <div class="file-ico ${color}"><i class="fas ${icon}"></i></div>
      <div style="flex:1;min-width:0;"><div class="file-name">${d.fileName||'-'}</div><div class="file-date"><i class="fas fa-calendar-alt"></i> ${date}</div></div>
      <button class="btn-sm btn-view" onclick="previewFile('${d.fileUrl}','${d.fileName}','${isLink?'link':(isPdf?'pdf':'img')}')"><i class="fas fa-eye"></i> ดู</button>
    </div>`;
  }).join('');
}

window.previewFile=function(url,name,type){
  let eUrl = url;
  if(eUrl.includes('drive.google.com/file/d/')){ eUrl = eUrl.replace(/\/view.*?$/, '/preview'); }
  document.getElementById('previewTitle').textContent=name;
  if(type==='pdf' || type==='link'){ document.getElementById('previewBody').innerHTML=`<iframe src="${eUrl}"></iframe>`; }
  else { document.getElementById('previewBody').innerHTML=`<img src="${eUrl}" alt="${name}" style="max-width:100%;border-radius:10px;">`; }
  document.getElementById('previewModal').classList.add('show');
};
window.closePreview=function(){document.getElementById('previewModal').classList.remove('show');};
window.doLogout=async function(){await signOut(auth);window.location.href='/bicc-ovec/login.php';};
</script>
</body>
</html>
