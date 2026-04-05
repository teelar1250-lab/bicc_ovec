<?php $pageTitle = "อัปโหลดเอกสาร — BICC OVEC"; ?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sidebar-bg:#ffffff;--card:#ffffff;--card-h:#f1f5f9;--accent:#3b82f6;--accent2:#8b5cf6;--teal:#0ea5e9;--text:#0f172a;--text2:#475569;--border:#e2e8f0;--danger:#ef4444;--success:#10b981;--sw:260px;--font:'Sarabun',sans-serif;}
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
.nav-a.active{background:linear-gradient(135deg,rgba(79,142,247,0.18),rgba(124,58,237,0.18));color:var(--accent);border:1px solid rgba(79,142,247,0.28);}
.nav-a i{width:18px;text-align:center;font-size:15px;}
.sb-user{padding:14px 18px;border-top:1px solid var(--border);display:flex;align-items:center;gap:10px;}
.avatar{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent2));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0;}
.u-name{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.u-role{font-size:10.5px;color:var(--text2);}
.logout-btn{background:none;border:none;color:var(--text2);cursor:pointer;padding:5px;font-size:15px;transition:color .2s;margin-left:auto;}
.logout-btn:hover{color:var(--danger);}
.main{margin-left:var(--sw);flex:1;padding:30px 32px;background:radial-gradient(ellipse at 10% 10%,rgba(59,130,246,0.04) 0%,transparent 50%),var(--bg);}
.page-header{display:flex;align-items:center;gap:14px;margin-bottom:26px;}
.back-btn{display:flex;align-items:center;justify-content:center;width:38px;height:38px;background:var(--card);border:1px solid var(--border);border-radius:10px;color:var(--text2);text-decoration:none;transition:all .2s;font-size:15px;}
.back-btn:hover{background:var(--card-h);color:var(--text);}
.page-title{font-size:22px;font-weight:700;}
.page-sub{font-size:13px;color:var(--text2);margin-top:3px;}
/* Travel info banner */
.travel-info{background:#ffffff;border:1px solid var(--border);box-shadow:0 4px 15px rgba(0,0,0,0.02);border-radius:14px;padding:18px 22px;margin-bottom:22px;}
.travel-info h3{font-size:15px;font-weight:700;margin-bottom:8px;color:var(--accent);}
.info-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;}
.info-item .lbl{font-size:11.5px;color:var(--text2);margin-bottom:3px;}
.info-item .val{font-size:13.5px;color:var(--text);font-weight:600;}
/* Upload zone */
.card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);margin-bottom:20px;}
.card-title{font-size:16px;font-weight:700;margin-bottom:18px;display:flex;align-items:center;gap:8px;}
.drop-zone{border:2px dashed #cbd5e1;border-radius:14px;padding:44px 24px;text-align:center;transition:all .3s;cursor:pointer;position:relative;background:#f8fafc;}
.drop-zone:hover,.drop-zone.drag-over{border-color:var(--accent);background:#eff6ff;}
.drop-icon{font-size:44px;margin-bottom:14px;color:var(--text2);opacity:.6;}
.drop-zone h3{font-size:16px;font-weight:700;margin-bottom:6px;}
.drop-zone p{font-size:13px;color:var(--text2);margin-bottom:16px;}
.drop-zone input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;}
.btn-upload{display:inline-flex;align-items:center;gap:7px;padding:10px 20px;background:linear-gradient(135deg,var(--accent),var(--accent2));border:none;border-radius:10px;color:#fff;font-family:var(--font);font-size:14px;font-weight:600;cursor:pointer;}
/* Progress */
.upload-progress{margin-top:16px;display:none;}
.progress-bar{background:rgba(255,255,255,0.08);border-radius:20px;height:8px;overflow:hidden;margin-top:8px;}
.progress-fill{height:100%;background:linear-gradient(90deg,var(--accent),var(--accent2));border-radius:20px;transition:width .3s;width:0%;}
.prog-text{font-size:13px;color:var(--text2);display:flex;justify-content:space-between;margin-top:5px;}
/* File list */
.file-list{display:grid;gap:12px;margin-top:4px;}
.file-item{background:#f8fafc;border:1px solid var(--border);border-radius:12px;padding:14px 16px;display:flex;align-items:center;gap:14px;transition:all .2s;}
.file-item:hover{background:var(--card-h);}
.file-ico{width:44px;height:44px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0;}
.file-ico.img{background:rgba(16,185,129,0.15);color:#34d399;}
.file-ico.pdf{background:rgba(239,68,68,0.15);color:#f87171;}
.file-info{flex:1;min-width:0;}
.file-name{font-size:14px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;}
.file-meta{font-size:12px;color:var(--text2);margin-top:3px;}
.file-actions{display:flex;gap:6px;}
.btn-sm{display:inline-flex;align-items:center;gap:5px;padding:7px 12px;border-radius:8px;font-family:var(--font);font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:all .2s;text-decoration:none;}
.btn-preview{background:rgba(79,142,247,0.15);color:#93c5fd;border:1px solid rgba(79,142,247,0.28);}
.btn-preview:hover{background:rgba(79,142,247,0.25);}
.btn-del{background:rgba(239,68,68,0.12);color:#f87171;border:1px solid rgba(239,68,68,0.25);}
.btn-del:hover{background:rgba(239,68,68,0.22);}
.empty-state{text-align:center;padding:32px;color:var(--text2);}
.empty-state i{font-size:36px;margin-bottom:10px;opacity:.3;}
/* Preview Modal */
.modal-overlay{display:none;position:fixed;inset:0;background:rgba(0,0,0,0.85);z-index:999;align-items:center;justify-content:center;padding:20px;}
.modal-overlay.show{display:flex;}
.modal-box{background:#ffffff;border:1px solid var(--border);border-radius:16px;max-width:900px;width:100%;max-height:90vh;display:flex;flex-direction:column;overflow:hidden;}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid var(--border);}
.modal-title{font-size:15px;font-weight:700;}
.modal-close{background:none;border:none;color:var(--text2);cursor:pointer;font-size:18px;padding:4px;}
.modal-close:hover{color:var(--text);}
.modal-body{flex:1;overflow:auto;padding:16px;}
.modal-body img{max-width:100%;border-radius:10px;}
.modal-body iframe{width:100%;height:65vh;border:none;border-radius:8px;}
/* Loading */
.loading-overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:998;gap:16px;}
.loading-overlay .spin{width:44px;height:44px;border:3px solid rgba(79,142,247,0.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
.alert{display:flex;align-items:center;gap:9px;padding:11px 16px;border-radius:10px;font-size:13.5px;margin-bottom:14px;}
.alert-success{background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.28);color:#6ee7b7;}
.alert-err{background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.28);color:#fca5a5;}
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
    <div>
      <div class="page-title">📎 อัปโหลดเอกสารหลังกลับ</div>
      <div class="page-sub">กระบวนการที่ 2 — อัปโหลดรูปภาพหรือ PDF หลังจากกลับจากราชการ</div>
    </div>
  </div>

  <div class="travel-info" id="travelInfo" style="display:none">
    <h3 id="travelSubject">กำลังโหลด...</h3>
    <div class="info-grid">
      <div class="info-item"><div class="lbl">ผู้ไปราชการ</div><div class="val" id="tiName">—</div></div>
      <div class="info-item"><div class="lbl">วันที่ไป - กลับ</div><div class="val" id="tiDates">—</div></div>
      <div class="info-item"><div class="lbl">สถานที่</div><div class="val" id="tiLocation">—</div></div>
    </div>
  </div>

  <div id="alertArea"></div>

  <div class="card">
    <div class="card-title"><i class="fas fa-link" style="color:var(--accent)"></i> แนบลิงก์เอกสาร (Google Drive)</div>
    <div class="drop-zone" id="dropZone" style="padding:24px;text-align:left;border:1px solid var(--border);background:#f8fafc;cursor:default;">
      <div style="margin-bottom:14px">
        <label style="font-size:13.5px;color:var(--text2);margin-bottom:6px;display:block">ชื่อเอกสาร (เช่น สลิปเบี้ยเลี้ยง, รูปถ่ายหน้างาน)</label>
        <input type="text" id="linkName" style="width:100%;background:#ffffff;border:1px solid var(--border);border-radius:10px;padding:12px;color:var(--text);font-family:var(--font);font-size:14px;outline:none;" placeholder="ระบุชื่อเอกสาร...">
      </div>
      <div style="margin-bottom:20px">
        <label style="font-size:13.5px;color:var(--text2);margin-bottom:6px;display:block">ลิงก์ Google Drive (ต้องตั้งค่าแชร์เป็น 'ทุกคนที่มีลิงก์' ด้วยนะครับ)</label>
        <input type="text" id="linkUrl" style="width:100%;background:#ffffff;border:1px solid var(--border);border-radius:10px;padding:12px;color:var(--text);font-family:var(--font);font-size:14px;outline:none;" placeholder="https://drive.google.com/file/d/...">
      </div>
      <button class="btn-upload" onclick="saveLink()"><i class="fas fa-save"></i> บันทึกลิงก์เอกสาร</button>
    </div>
  </div>

  <div class="card">
    <div class="card-title"><i class="fas fa-file-alt" style="color:var(--teal)"></i> เอกสารที่อัปโหลดแล้ว (<span id="docCount">0</span> ไฟล์)</div>
    <div class="file-list" id="fileList">
      <div class="empty-state"><i class="fas fa-folder-open"></i><p>ยังไม่มีไฟล์ที่อัปโหลด</p></div>
    </div>
  </div>
</main>

<!-- Preview Modal -->
<div class="modal-overlay" id="previewModal">
  <div class="modal-box" style="max-width:860px">
    <div class="modal-header">
      <span class="modal-title" id="previewTitle">ดูตัวอย่างไฟล์</span>
      <button class="modal-close" onclick="closePreview()"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body" id="previewBody"></div>
  </div>
</div>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, onAuthStateChanged, signOut } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc, collection, addDoc, getDocs, deleteDoc, serverTimestamp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);

const params = new URLSearchParams(window.location.search);
const travelId = params.get('id');
let currentUser = null;

if(!travelId){ window.location.href='/bicc-ovec/user/dashboard.php'; }

onAuthStateChanged(auth, async user => {
  if(!user){ window.location.href='/bicc-ovec/login.php'; return; }
  currentUser = user;
  const snap = await getDoc(doc(db,'users',user.uid));
  if(!snap.exists()){ signOut(auth); return; }
  const ud = snap.data();
  document.getElementById('sbName').textContent = ud.displayName||user.email;
  document.getElementById('sbAvatar').textContent = (ud.displayName||'U').charAt(0).toUpperCase();
  await loadTravel();
  await loadDocs();
  document.getElementById('loadingOverlay').style.display='none';
});

async function loadTravel(){
  const snap = await getDoc(doc(db,'travels',travelId));
  if(!snap.exists()){ window.location.href='/bicc-ovec/user/dashboard.php'; return; }
  const d = snap.data();
  if(d.userId !== currentUser.uid){ window.location.href='/bicc-ovec/user/dashboard.php'; return; }
  document.getElementById('travelInfo').style.display='block';
  document.getElementById('travelSubject').textContent = '📋 '+d.subject;
  document.getElementById('tiName').textContent = d.travelerName||'-';
  document.getElementById('tiDates').textContent = (d.startDate||'-')+' ถึง '+(d.endDate||'-');
  document.getElementById('tiLocation').textContent = d.location||'-';
}

async function loadDocs(){
  const snap = await getDocs(collection(db,'travels',travelId,'documents'));
  const docs = snap.docs.map(d=>({id:d.id,...d.data()}));
  document.getElementById('docCount').textContent = docs.length;
  renderDocs(docs);
}

function renderDocs(docs){
  const list = document.getElementById('fileList');
  if(!docs.length){
    list.innerHTML = '<div class="empty-state"><i class="fas fa-folder-open"></i><p>ยังไม่มีลิงก์เอกสาร</p></div>';
    return;
  }
  list.innerHTML = docs.map(d=>{
    const date = d.uploadedAt?.toDate ? d.uploadedAt.toDate().toLocaleDateString('th-TH',{year:'numeric',month:'long',day:'numeric',hour:'2-digit',minute:'2-digit'}) : '-';
    return `<div class="file-item">
      <div class="file-ico img"><i class="fas fa-link"></i></div>
      <div class="file-info">
        <div class="file-name">${d.fileName||'เอกสารอ้างอิง'}</div>
        <div class="file-meta"><i class="fas fa-calendar-alt"></i> แนบเมื่อ ${date}</div>
      </div>
      <div class="file-actions">
        <button class="btn-sm btn-preview" onclick="previewFile('${d.fileUrl}','${d.fileName}','link')"><i class="fas fa-eye"></i> ดู</button>
        <button class="btn-sm btn-del" onclick="delDoc('${d.id}')"><i class="fas fa-trash"></i> ลบ</button>
      </div>
    </div>`;
  }).join('');
}

window.saveLink = async function() {
  const name = document.getElementById('linkName').value.trim();
  let url = document.getElementById('linkUrl').value.trim();
  
  if(!name || !url) { showAlert('กรุณากรอกชื่อและลิงก์ให้ครบถ้วน','err'); return; }
  if(!url.startsWith('http')) { url = 'https://' + url; }

  try {
    await addDoc(collection(db,'travels',travelId,'documents'),{
      fileUrl: url,
      fileName: name,
      fileType: 'link',
      uploadedAt: serverTimestamp(),
      uploadedBy: currentUser.uid
    });
    showAlert('บันทึกลิงก์สำเร็จ: '+name,'ok');
    document.getElementById('linkName').value = '';
    document.getElementById('linkUrl').value = '';
    await loadDocs();
  } catch(e) {
    showAlert('เกิดข้อผิดพลาดในการบันทึก','err');
  }
}

window.delDoc = async function(docId, storagePath){
  if(!confirm('ต้องการลบไฟล์นี้ออกจากระบบ? (ไฟล์จริงใน Google Drive จะไม่ถูกลบอัตโนมัติ)')) return;
  try{
    await deleteDoc(doc(db,'travels',travelId,'documents',docId));
    await loadDocs();
    showAlert('ลบไฟล์เรียบร้อยแล้ว','ok');
  }catch(e){ showAlert('เกิดข้อผิดพลาด','err'); }
};

window.previewFile = function(url, name, type){
  // Convert Drive view url to preview url to allow iframe embedding
  let embedUrl = url;
  if(embedUrl.includes('drive.google.com/file/d/')){
    embedUrl = embedUrl.replace(/\/view.*?$/, '/preview');
  }
  
  document.getElementById('previewTitle').textContent = name;
  document.getElementById('previewBody').innerHTML = `<iframe src="${embedUrl}"></iframe>`;
  document.getElementById('previewModal').classList.add('show');
};
window.closePreview = function(){ document.getElementById('previewModal').classList.remove('show'); document.getElementById('previewBody').innerHTML=''; };

function showAlert(msg, type){
  const a = document.createElement('div');
  a.className = 'alert alert-'+(type==='ok'?'success':'err');
  a.innerHTML = `<i class="fas ${type==='ok'?'fa-check-circle':'fa-exclamation-circle'}"></i>${msg}`;
  document.getElementById('alertArea').appendChild(a);
  setTimeout(()=>a.remove(), 4000);
}

window.doLogout = async function(){ await signOut(auth); window.location.href='/bicc-ovec/login.php'; };
</script>
</body>
</html>
