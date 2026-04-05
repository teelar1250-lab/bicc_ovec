<?php
$isEdit = isset($_GET['id']) && !empty($_GET['id']);
$pageTitle = ($isEdit ? "แก้ไข" : "เพิ่ม") . "รายการย้อนหลัง (Admin) — BICC OVEC";
?>
<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $pageTitle ?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sidebar-bg:#ffffff;--card:#ffffff;--card-h:#f1f5f9;--accent:#3b82f6;--accent2:#8b5cf6;--text:#0f172a;--text2:#475569;--border:#e2e8f0;--success:#10b981;--danger:#ef4444;--sw:260px;--font:'Sarabun',sans-serif;}
body{font-family:var(--font);background:var(--bg);color:var(--text);min-height:100vh;display:flex;}
.sidebar{width:var(--sw);min-height:100vh;background:var(--sidebar-bg);border-right:1px solid var(--border);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03);}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:12px;}
.sb-logo img{height:38px;}
.sb-logo-text .t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px;}
.admin-badge{font-size:9.5px;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:2px 7px;border-radius:20px;font-weight:700;letter-spacing:.5px;margin-top:2px;display:inline-block;}
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
/* Form card */
.form-card{background:var(--card);border:1px solid var(--border);border-radius:16px;padding:28px;margin-bottom:20px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04);}
.form-section-title{font-size:14px;font-weight:700;color:var(--accent);margin-bottom:18px;padding-bottom:10px;border-bottom:1px solid var(--border);display:flex;align-items:center;gap:8px;}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
.form-grid-3{display:grid;grid-template-columns:1fr 1fr 1fr;gap:18px;}
.form-group{display:flex;flex-direction:column;gap:7px;}
.form-group.full{grid-column:1/-1;}
.form-label{font-size:13px;font-weight:600;color:var(--text2);}
.form-label .req{color:#f87171;margin-left:3px;}
.inp{background:#f1f5f9;border:1px solid #cbd5e1;border-radius:11px;padding:11px 14px;color:var(--text);font-family:var(--font);font-size:14.5px;transition:all .3s;outline:none;width:100%;}
.inp:focus{border-color:var(--accent);background:#ffffff;box-shadow:0 0 0 3px rgba(59,130,246,0.15);}
.inp::placeholder{color:#94a3b8;}
select.inp{cursor:pointer;}
select.inp option{background:#ffffff;color:var(--text);}
textarea.inp{resize:vertical;min-height:90px;}
/* Fund source radio */
.fund-wrap{display:flex;gap:14px;flex-wrap:wrap;}
.radio-card{display:flex;align-items:center;gap:9px;padding:11px 16px;background:#f8fafc;border:1px solid var(--border);border-radius:10px;cursor:pointer;transition:all .2s;}
.radio-card:hover{background:var(--card-h);}
.radio-card input{accent-color:var(--accent);}
.radio-card.selected{border-color:var(--accent);background:#eff6ff;}
.fund-detail-wrap{margin-top:12px;display:none;}
.fund-detail-wrap.show{display:block;}
/* Amount input */
.amount-wrap{position:relative;}
.amount-prefix{position:absolute;left:13px;top:50%;transform:translateY(-50%);color:var(--text2);font-size:14px;font-weight:600;}
.amount-inp{padding-left:50px !important;}
/* Buttons */
.btn-row{display:flex;gap:12px;justify-content:flex-end;margin-top:4px;}
.btn{display:inline-flex;align-items:center;gap:7px;padding:11px 22px;border-radius:10px;font-family:var(--font);font-size:15px;font-weight:600;cursor:pointer;border:none;transition:all .2s;text-decoration:none;}
.btn-primary{background:linear-gradient(135deg,var(--accent),var(--accent2));color:#fff;}
.btn-primary:hover{transform:translateY(-1px);box-shadow:0 8px 22px rgba(79,142,247,0.4);}
.btn-primary:disabled{opacity:.6;cursor:not-allowed;transform:none;}
.btn-ghost{background:transparent;border:1px solid var(--border);color:var(--text2);}
.btn-ghost:hover{background:var(--card-h);color:var(--text);}
.ok-box{display:none;background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.28);border-radius:10px;padding:12px 16px;color:#6ee7b7;font-size:14px;margin-bottom:16px;gap:9px;align-items:center;}
.ok-box.show{display:flex;}
.err-box{display:none;background:rgba(239,68,68,0.12);border:1px solid rgba(239,68,68,0.28);border-radius:10px;padding:12px 16px;color:#fca5a5;font-size:14px;margin-bottom:16px;gap:9px;align-items:center;}
.err-box.show{display:flex;}
.loading-overlay{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:999;gap:16px;}
.loading-overlay .spin{width:44px;height:44px;border:3px solid rgba(79,142,247,0.2);border-top-color:var(--accent);border-radius:50%;animation:spin .8s linear infinite;}
@keyframes spin{to{transform:rotate(360deg);}}
.spinner{display:none;width:16px;height:16px;border:2px solid rgba(255,255,255,0.3);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;}
.btn-primary.loading .spinner{display:inline-block;}
.btn-primary.loading .btn-text{display:none;}
</style>
</head>
<body>

<div class="loading-overlay" id="loadingOverlay">
  <div class="spin"></div><p style="color:var(--text2)">กำลังโหลด...</p>
</div>

<aside class="sidebar">
  <div class="sb-logo">
    <img src="/bicc-ovec/assets/logo.png" alt="logo" onerror="this.style.display='none'">
    <div class="sb-logo-text"><div class="t1">BICC OVEC</div><div class="admin-badge">ADMIN</div></div>
  </div>
  <nav class="sb-nav">
    <div class="nav-lbl">ผู้ดูแลระบบ</div>
    <a class="nav-a" href="/bicc-ovec/admin/dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
    <a class="nav-a active" href="/bicc-ovec/admin/travel_form.php"><i class="fas fa-plus"></i> เพิ่มข้อมูลย้อนหลัง</a>
    <a class="nav-a" href="/bicc-ovec/admin/users.php"><i class="fas fa-users"></i> จัดการผู้ใช้</a>
    <div class="nav-lbl" style="margin-top:8px;">บัญชี</div>
    <button class="nav-a" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-user">
    <div class="avatar" id="sbAvatar" style="background:linear-gradient(135deg,#f59e0b,#ef4444)">A</div>
    <div style="flex:1;min-width:0;">
      <div class="u-name" id="sbName">กำลังโหลด...</div>
      <div class="u-role">ผู้ดูแลระบบ</div>
    </div>
    <button class="logout-btn" onclick="doLogout()"><i class="fas fa-power-off"></i></button>
  </div>
</aside>

<main class="main">
  <div class="page-header">
    <a href="/bicc-ovec/user/dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i></a>
    <div>
      <div class="page-title" id="formTitle">📝 เพิ่มรายการย้อนหลัง (Admin)</div>
      <div class="page-sub">บันทึกข้อมูลและอนุมัติทันที</div>
    </div>
  </div>

  <div class="ok-box" id="okBox"><i class="fas fa-check-circle"></i><span id="okText"></span></div>
  <div class="err-box" id="errBox"><i class="fas fa-exclamation-circle"></i><span id="errText"></span></div>

  <form id="travelForm">
    <!-- ส่วนที่ 1: ข้อมูลผู้ไปราชการ -->
    <div class="form-card">
      <div class="form-section-title"><i class="fas fa-user"></i> ข้อมูลผู้ไปราชการ</div>
      <div class="form-grid">
        <div class="form-group">
          <label class="form-label">ที่รายการ <span class="req">*</span></label>
          <input type="text" id="itemNumber" class="inp" placeholder="เช่น 001/2568" required>
        </div>
        <div class="form-group">
          <label class="form-label">ชื่อผู้ไปราชการ <span class="req">*</span></label>
          <input type="text" id="travelerName" class="inp" placeholder="ชื่อ-นามสกุล" required>
        </div>
        <div class="form-group">
          <label class="form-label">ตำแหน่ง <span class="req">*</span></label>
          <input type="text" id="position" class="inp" placeholder="ตำแหน่งงาน" required>
        </div>
        <div class="form-group">
          <label class="form-label">หน่วยงาน / แผนก <span class="req">*</span></label>
          <input type="text" id="department" class="inp" placeholder="ชื่อหน่วยงาน" required>
        </div>
      </div>
    </div>

    <!-- ส่วนที่ 2: รายละเอียดการไปราชการ -->
    <div class="form-card">
      <div class="form-section-title"><i class="fas fa-briefcase"></i> รายละเอียดการไปราชการ</div>
      <div class="form-grid">
        <div class="form-group full">
          <label class="form-label">เรื่องที่ไป <span class="req">*</span></label>
          <textarea id="subject" class="inp" placeholder="ระบุเรื่อง/วัตถุประสงค์ที่ไปราชการ" required></textarea>
        </div>
        <div class="form-group full">
          <label class="form-label">สถานที่ <span class="req">*</span></label>
          <input type="text" id="location" class="inp" placeholder="สถานที่ไปราชการ เช่น โรงแรม..., จ.กรุงเทพฯ" required>
        </div>
        <div class="form-group">
          <label class="form-label">วันที่ไป <span class="req">*</span></label>
          <input type="date" id="startDate" class="inp" required>
        </div>
        <div class="form-group">
          <label class="form-label">วันที่กลับ <span class="req">*</span></label>
          <input type="date" id="endDate" class="inp" required>
        </div>
        <div class="form-group">
          <label class="form-label">ปีงบประมาณ <span class="req">*</span></label>
          <select id="fiscalYear" class="inp" required>
            <option value="2567">2567</option>
            <option value="2568">2568</option>
            <option value="2569" selected>2569</option>
            <option value="2570">2570</option>
            <option value="2571">2571</option>
            <option value="2572">2572</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">ประเภทการไปราชการ <span class="req">*</span></label>
          <select id="travelType" class="inp" required>
            <option value="">— เลือกประเภท —</option>
            <option value="อบรม">อบรม</option>
            <option value="ประชุม">ประชุม</option>
            <option value="ดูงาน">ดูงาน</option>
            <option value="สัมมนา">สัมมนา</option>
            <option value="แข่งขัน">แข่งขัน</option>
            <option value="อื่นๆ">อื่นๆ</option>
          </select>
        </div>
      </div>
    </div>

    <!-- ส่วนที่ 3: การเบิกค่าใช้จ่าย -->
    <div class="form-card">
      <div class="form-section-title"><i class="fas fa-wallet"></i> การเบิกค่าใช้จ่าย</div>
      <div class="form-group" style="margin-bottom:16px;">
        <label class="form-label">จำนวนเงินที่เบิก (บาท) <span class="req">*</span></label>
        <div class="amount-wrap">
          <span class="amount-prefix">฿</span>
          <input type="number" id="totalAmount" class="inp amount-inp" placeholder="0.00" min="0" step="0.01" required>
        </div>
      </div>
      <div class="form-group" style="margin-bottom:16px;">
        <label class="form-label">แหล่งเงิน <span class="req">*</span></label>
        <div class="fund-wrap">
          <label class="radio-card" id="rc-college" onclick="selectFund('college')">
            <input type="radio" name="fundSource" value="college" id="fundCollege"> <i class="fas fa-university" style="color:var(--accent)"></i> จากวิทยาลัย
          </label>
          <label class="radio-card" id="rc-project" onclick="selectFund('project')">
            <input type="radio" name="fundSource" value="project" id="fundProject"> <i class="fas fa-project-diagram" style="color:var(--teal,#06b6d4)"></i> จากโครงการ
          </label>
        </div>
        <div class="fund-detail-wrap" id="fundDetailWrap">
          <input type="text" id="fundDetail" class="inp" placeholder="ระบุชื่อโครงการ..." style="margin-top:10px;">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">หมายเหตุ</label>
        <textarea id="remark" class="inp" placeholder="หมายเหตุเพิ่มเติม (ถ้ามี)" style="min-height:70px;"></textarea>
      </div>
    </div>

    <div class="btn-row">
      <a href="/bicc-ovec/admin/dashboard.php" class="btn btn-ghost"><i class="fas fa-times"></i> ยกเลิก</a>
      <button type="submit" class="btn btn-primary" id="saveBtn">
        <span class="btn-text"><i class="fas fa-save"></i> บันทึกข้อมูล</span>
        <span class="spinner"></span>
      </button>
    </div>
  </form>
</main>

<script type="module">
import { initializeApp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import { getAuth, onAuthStateChanged, signOut } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import { getFirestore, doc, getDoc, addDoc, updateDoc, collection, serverTimestamp } from 'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';

const app = initializeApp({
  apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",
  projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",
  messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"
});
const auth = getAuth(app);
const db = getFirestore(app);

const urlParams = new URLSearchParams(window.location.search);
const editId = urlParams.get('id');
let currentUser = null;

window.selectFund = function(val){
  document.getElementById('fundCollege').checked = val==='college';
  document.getElementById('fundProject').checked = val==='project';
  document.getElementById('rc-college').classList.toggle('selected', val==='college');
  document.getElementById('rc-project').classList.toggle('selected', val==='project');
  document.getElementById('fundDetailWrap').classList.toggle('show', val==='project');
};

onAuthStateChanged(auth, async user => {
  if(!user){ window.location.href='/bicc-ovec/login.php'; return; }
  currentUser = user;
  const snap = await getDoc(doc(db,'users',user.uid));
  if(!snap.exists() || snap.data().role !== 'admin'){ await signOut(auth); window.location.href='/bicc-ovec/login.php'; return; }
  const ud = snap.data();
  document.getElementById('sbName').textContent = ud.displayName||user.email;
  document.getElementById('sbAvatar').textContent = (ud.displayName||'A').charAt(0).toUpperCase();

  if(editId){
    document.getElementById('formTitle').textContent = '✏️ แก้ไขรายการไปราชการ (Admin)';
    await loadEdit(editId, ud);
  }
  document.getElementById('loadingOverlay').style.display='none';
});

async function loadEdit(id, ud){
  const snap = await getDoc(doc(db,'travels',id));
  if(!snap.exists()) return;
  const d = snap.data();
  document.getElementById('itemNumber').value = d.itemNumber||'';
  document.getElementById('travelerName').value = d.travelerName||'';
  document.getElementById('position').value = d.position||'';
  document.getElementById('department').value = d.department||'';
  document.getElementById('subject').value = d.subject||'';
  document.getElementById('location').value = d.location||'';
  document.getElementById('startDate').value = d.startDate||'';
  document.getElementById('endDate').value = d.endDate||'';
  document.getElementById('fiscalYear').value = d.fiscalYear||'2569';
  document.getElementById('travelType').value = d.travelType||'';
  document.getElementById('totalAmount').value = d.totalAmount||'';
  document.getElementById('remark').value = d.remark||'';
  if(d.fundSource) selectFund(d.fundSource);
  document.getElementById('fundDetail').value = d.fundDetail||'';
}

document.getElementById('travelForm').addEventListener('submit', async e => {
  e.preventDefault();
  const btn = document.getElementById('saveBtn');
  const okBox = document.getElementById('okBox');
  const errBox = document.getElementById('errBox');
  okBox.classList.remove('show'); errBox.classList.remove('show');
  btn.classList.add('loading'); btn.disabled=true;

  const fundSource = document.getElementById('fundCollege').checked ? 'college' : document.getElementById('fundProject').checked ? 'project' : '';
  if(!fundSource){
    errBox.classList.add('show'); document.getElementById('errText').textContent='กรุณาเลือกแหล่งเงิน';
    btn.classList.remove('loading'); btn.disabled=false; return;
  }

  const data = {
    userId: currentUser.uid,
    itemNumber: document.getElementById('itemNumber').value.trim(),
    travelerName: document.getElementById('travelerName').value.trim(),
    position: document.getElementById('position').value.trim(),
    department: document.getElementById('department').value.trim(),
    subject: document.getElementById('subject').value.trim(),
    location: document.getElementById('location').value.trim(),
    startDate: document.getElementById('startDate').value,
    endDate: document.getElementById('endDate').value,
    fiscalYear: document.getElementById('fiscalYear').value,
    travelType: document.getElementById('travelType').value,
    totalAmount: parseFloat(document.getElementById('totalAmount').value)||0,
    fundSource, fundDetail: document.getElementById('fundDetail').value.trim(),
    remark: document.getElementById('remark').value.trim(),
    updatedAt: serverTimestamp()
  };

  try {
    if(editId){
      await updateDoc(doc(db,'travels',editId), data);
      okBox.classList.add('show'); document.getElementById('okText').textContent='บันทึกการแก้ไขเรียบร้อยแล้ว!';
    } else {
      data.status='approved'; data.createdAt=serverTimestamp(); data.addedByAdmin=true;
      const ref = await addDoc(collection(db,'travels'), data);
      okBox.classList.add('show'); document.getElementById('okText').textContent='เพิ่มรายการย้อนหลังและอนุมัติสำเร็จ!';
    }
    btn.classList.remove('loading'); btn.disabled=false;
    setTimeout(()=>window.location.href='/bicc-ovec/admin/dashboard.php', 1800);
  } catch(err){
    btn.classList.remove('loading'); btn.disabled=false;
    errBox.classList.add('show'); document.getElementById('errText').textContent='เกิดข้อผิดพลาด: '+err.message;
  }
});

window.doLogout = async function(){ await signOut(auth); window.location.href='/bicc-ovec/login.php'; };
</script>
</body>
</html>
