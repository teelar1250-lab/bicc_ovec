<?php $p="จัดการผู้ใช้ — BICC OVEC"; ?>
<!DOCTYPE html><html lang="th"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=$p?></title>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{--bg:#f8fafc;--sb:#ffffff;--card:#ffffff;--ch:#f1f5f9;--a:#3b82f6;--a2:#8b5cf6;--t:#0f172a;--t2:#475569;--b:#e2e8f0;--ok:#10b981;--err:#ef4444;--warn:#f59e0b;--sw:260px;--f:'Sarabun',sans-serif}
body{font-family:var(--f);background:var(--bg);color:var(--t);min-height:100vh;display:flex}
.sb{width:var(--sw);min-height:100vh;background:var(--sb);border-right:1px solid var(--b);position:fixed;left:0;top:0;display:flex;flex-direction:column;z-index:100;box-shadow:1px 0 15px rgba(0,0,0,0.03)}
.sb-logo{padding:22px 20px;border-bottom:1px solid var(--b);display:flex;align-items:center;gap:12px}
.sb-logo img{height:38px}
.t1{font-size:17px;font-weight:800;background:linear-gradient(135deg,#4f8ef7,#7c3aed);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;letter-spacing:1.5px}
.abadge{font-size:9.5px;background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:2px 7px;border-radius:20px;font-weight:700}
.sb-nav{flex:1;padding:14px 10px}
.nl{font-size:10.5px;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:1.2px;padding:10px 12px 6px}
.na{display:flex;align-items:center;gap:11px;padding:10px 13px;border-radius:10px;color:var(--t2);text-decoration:none;font-size:14px;font-weight:500;transition:all .2s;margin-bottom:2px;cursor:pointer;border:none;background:none;width:100%}
.na:hover{background:var(--ch);color:var(--t)}
.na.act{background:linear-gradient(135deg,rgba(79,142,247,.18),rgba(124,58,237,.18));color:var(--a);border:1px solid rgba(79,142,247,.28)}
.na i{width:18px;text-align:center;font-size:15px}
.sb-foot{padding:14px 18px;border-top:1px solid var(--b);display:flex;align-items:center;gap:10px}
.av{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#ef4444);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff;flex-shrink:0}
.un{font-size:13px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.ur{font-size:10.5px;color:#fbbf24}
.lb{background:none;border:none;color:var(--t2);cursor:pointer;padding:5px;font-size:15px;margin-left:auto}
.lb:hover{color:var(--err)}
.main{margin-left:var(--sw);flex:1;padding:30px 32px;background:radial-gradient(ellipse at 10% 10%,rgba(59,130,246,.04) 0%,transparent 50%),var(--bg)}
.ph{display:flex;align-items:center;justify-content:space-between;margin-bottom:26px;flex-wrap:wrap;gap:12px}
.pt{font-size:24px;font-weight:700}
.ps{font-size:13px;color:var(--t2);margin-top:3px}
.card{background:var(--card);border:1px solid var(--b);border-radius:16px;padding:24px;box-shadow:0 10px 25px -5px rgba(0,0,0,0.04)}
.cht{display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;flex-wrap:wrap;gap:10px}
.ctitle{font-size:16px;font-weight:700}
.si{background:#f1f5f9;border:1px solid #cbd5e1;border-radius:9px;padding:8px 13px;color:var(--t);font-family:var(--f);font-size:13px;outline:none;width:200px}
.si:focus{border-color:var(--a);background:#ffffff;}
.tw{overflow-x:auto}
table{width:100%;border-collapse:collapse}
thead th{padding:11px 14px;text-align:left;font-size:11.5px;font-weight:700;color:var(--t2);text-transform:uppercase;letter-spacing:.5px;border-bottom:1px solid var(--b);white-space:nowrap}
tbody td{padding:13px 14px;font-size:13.5px;color:var(--t);border-bottom:1px solid var(--b)}
tbody tr:hover{background:var(--ch)}
tbody tr:last-child td{border-bottom:none}
.uav{width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--a),var(--a2));display:inline-flex;align-items:center;justify-content:center;font-weight:800;font-size:13px;color:#fff}
.rbadge{display:inline-flex;align-items:center;gap:5px;padding:4px 10px;border-radius:20px;font-size:12px;font-weight:700}
.radmin{background:linear-gradient(135deg,rgba(245,158,11,.15),rgba(239,68,68,.15));color:#fbbf24;border:1px solid rgba(245,158,11,.3)}
.ruser{background:rgba(79,142,247,.14);color:#93c5fd;border:1px solid rgba(79,142,247,.28)}
.act-col{display:flex;gap:6px;align-items:center}
.btn{display:inline-flex;align-items:center;gap:6px;padding:7px 13px;border-radius:8px;font-family:var(--f);font-size:12.5px;font-weight:600;cursor:pointer;border:none;transition:all .2s;text-decoration:none}
.bv{background:rgba(79,142,247,.15);color:#93c5fd;border:1px solid rgba(79,142,247,.28)}
.bv:hover{background:rgba(79,142,247,.25)}
.bma{background:linear-gradient(135deg,rgba(245,158,11,.15),rgba(239,68,68,.15));color:#fbbf24;border:1px solid rgba(245,158,11,.28)}
.bma:hover{opacity:.8}
.bmu{background:rgba(16,185,129,.15);color:#34d399;border:1px solid rgba(16,185,129,.28)}
.bmu:hover{background:rgba(16,185,129,.25)}
.es{text-align:center;padding:40px;color:var(--t2)}
.es i{font-size:40px;margin-bottom:12px;opacity:.3}
.lo{position:fixed;inset:0;background:var(--bg);display:flex;flex-direction:column;align-items:center;justify-content:center;z-index:999;gap:16px}
.sp{width:44px;height:44px;border:3px solid rgba(79,142,247,.2);border-top-color:var(--a);border-radius:50%;animation:spin .8s linear infinite}
@keyframes spin{to{transform:rotate(360deg)}}
/* User detail modal */
.mo{display:none;position:fixed;inset:0;background:rgba(0,0,0,.8);z-index:999;align-items:center;justify-content:center;padding:20px}
.mo.show{display:flex}
.mb{background:#ffffff;border:1px solid var(--b);border-radius:16px;max-width:500px;width:100%;overflow:hidden}
.mh{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid var(--b)}
.mc{background:none;border:none;color:var(--t2);cursor:pointer;font-size:18px;padding:4px}
.mc:hover{color:var(--t)}
.mbody{padding:20px}
.ud-row{display:flex;align-items:center;gap:14px;margin-bottom:20px}
.ud-av{width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--a),var(--a2));display:flex;align-items:center;justify-content:center;font-weight:800;font-size:22px;color:#fff}
.ud-name{font-size:18px;font-weight:700}
.ud-email{font-size:13px;color:var(--t2);margin-top:3px}
.ud-grid{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:20px}
.ud-item .label{font-size:11.5px;font-weight:600;color:var(--t2);margin-bottom:4px;text-transform:uppercase;letter-spacing:.4px}
.ud-item .value{font-size:14px;color:var(--t);font-weight:500}
.ud-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:20px}
.udst{background:#f8fafc;border:1px solid var(--b);border-radius:10px;padding:12px;text-align:center}
.udst .sv{font-size:22px;font-weight:800;color:var(--a)}
.udst .sl{font-size:11.5px;color:var(--t2);margin-top:2px}
.alert{display:flex;align-items:center;gap:8px;padding:10px 14px;border-radius:9px;font-size:13px;margin-top:12px}
.as{background:rgba(16,185,129,.12);border:1px solid rgba(16,185,129,.28);color:#6ee7b7}
.ae{background:rgba(239,68,68,.12);border:1px solid rgba(239,68,68,.28);color:#fca5a5}
.mfooter{display:flex;gap:10px;padding:0 20px 20px;flex-wrap:wrap}
</style></head><body>
<div class="lo" id="lo"><div class="sp"></div><p style="color:var(--t2)">กำลังโหลด...</p></div>
<aside class="sb">
  <div class="sb-logo"><img src="/bicc-ovec/assets/logo.png" onerror="this.style.display='none'"><div><div class="t1">BICC OVEC</div><div class="abadge">ADMIN</div></div></div>
  <nav class="sb-nav">
    <div class="nl">ผู้ดูแลระบบ</div>
    <a class="na" href="/bicc-ovec/admin/dashboard.php"><i class="fas fa-chart-pie"></i> Dashboard</a>
    <a class="na act" href="/bicc-ovec/admin/users.php"><i class="fas fa-users"></i> จัดการผู้ใช้</a>
    <div class="nl" style="margin-top:8px">บัญชี</div>
    <button class="na" onclick="doLogout()"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</button>
  </nav>
  <div class="sb-foot"><div class="av" id="sba">A</div><div style="flex:1;min-width:0"><div class="un" id="sbn">Admin</div><div class="ur">ผู้ดูแลระบบ</div></div><button class="lb" onclick="doLogout()"><i class="fas fa-power-off"></i></button></div>
</aside>
<main class="main">
  <div class="ph">
    <div><div class="pt">👥 จัดการผู้ใช้</div><div class="ps">รายชื่อผู้ใช้ทั้งหมดในระบบ</div></div>
  </div>
  <div class="card">
    <div class="cht">
      <div class="ctitle"><i class="fas fa-users" style="color:var(--a)"></i> ผู้ใช้ทั้งหมด (<span id="uCount">0</span> คน)</div>
      <input type="text" id="si" class="si" placeholder="🔍 ค้นหาชื่อ/อีเมล..." oninput="filterU()">
    </div>
    <div class="tw">
      <table>
        <thead><tr><th></th><th>ชื่อ-นามสกุล</th><th>อีเมล</th><th>ตำแหน่ง</th><th>หน่วยงาน</th><th>สิทธิ์</th><th>สมัครเมื่อ</th><th>จัดการ</th></tr></thead>
        <tbody id="uTbody"><tr><td colspan="8"><div class="es"><i class="fas fa-spinner fa-spin"></i><p>กำลังโหลด...</p></div></td></tr></tbody>
      </table>
    </div>
  </div>
</main>

<!-- User Detail Modal -->
<div class="mo" id="uModal">
  <div class="mb">
    <div class="mh"><span style="font-size:15px;font-weight:700"><i class="fas fa-user"></i> ข้อมูลผู้ใช้</span><button class="mc" onclick="closeModal()"><i class="fas fa-times"></i></button></div>
    <div class="mbody">
      <div class="ud-row">
        <div class="ud-av" id="mAv">?</div>
        <div><div class="ud-name" id="mName">—</div><div class="ud-email" id="mEmail">—</div></div>
      </div>
      <div class="ud-grid">
        <div class="ud-item"><div class="label">ตำแหน่ง</div><div class="value" id="mPos">—</div></div>
        <div class="ud-item"><div class="label">หน่วยงาน</div><div class="value" id="mDept">—</div></div>
        <div class="ud-item"><div class="label">สิทธิ์</div><div class="value" id="mRole">—</div></div>
        <div class="ud-item"><div class="label">สมัครเมื่อ</div><div class="value" id="mDate">—</div></div>
      </div>
      <div class="ud-stats">
        <div class="udst"><div class="sv" id="mAll">—</div><div class="sl">รายการทั้งหมด</div></div>
        <div class="udst"><div class="sv" id="mPend">—</div><div class="sl">รออนุมัติ</div></div>
        <div class="udst"><div class="sv" id="mAppr">—</div><div class="sl">อนุมัติแล้ว</div></div>
      </div>
      <div id="mAlert"></div>
    </div>
    <div class="mfooter" id="mFooter"></div>
  </div>
</div>

<script type="module">
import{initializeApp}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-app.js';
import{getAuth,onAuthStateChanged,signOut}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-auth.js';
import{getFirestore,doc,getDoc,updateDoc,collection,getDocs,query,where,orderBy}from'https://www.gstatic.com/firebasejs/10.8.0/firebase-firestore.js';
const app=initializeApp({apiKey:"AIzaSyCrMLNBs5dOlMiPPtsnDs1LWeanHBrZloo",authDomain:"bicc-ovec.firebaseapp.com",projectId:"bicc-ovec",storageBucket:"bicc-ovec.firebasestorage.app",messagingSenderId:"803024558580",appId:"1:803024558580:web:d950399ff91a1c8c5501a1"});
const auth=getAuth(app),db=getFirestore(app);
let allUsers=[],currentUid='';
onAuthStateChanged(auth,async u=>{
  if(!u){location.href='/bicc-ovec/login.php';return}
  const up=await getDoc(doc(db,'users',u.uid));
  if(!up.exists()||up.data().role!=='admin'){location.href='/bicc-ovec/user/dashboard.php';return}
  currentUid=u.uid;
  const ud=up.data();
  document.getElementById('sbn').textContent=ud.displayName||u.email;
  document.getElementById('sba').textContent=(ud.displayName||'A').charAt(0).toUpperCase();
  await loadUsers();
  document.getElementById('lo').style.display='none';
});
async function loadUsers(){
  const snap=await getDocs(collection(db,'users'));
  allUsers=snap.docs.map(d=>({id:d.id,...d.data()})).sort((a,b)=>(a.displayName||'').localeCompare(b.displayName||'','th'));
  document.getElementById('uCount').textContent=allUsers.length;
  renderTable(allUsers);
}
function renderTable(data){
  const tbody=document.getElementById('uTbody');
  if(!data.length){tbody.innerHTML='<tr><td colspan="8"><div class="es"><i class="fas fa-inbox"></i><p>ไม่พบผู้ใช้</p></div></td></tr>';return;}
  tbody.innerHTML=data.map(u=>{
    const name=u.displayName||'-';
    const init=(name||'?').charAt(0).toUpperCase();
    const date=u.createdAt?.toDate?u.createdAt.toDate().toLocaleDateString('th-TH',{year:'numeric',month:'short',day:'numeric'}):'-';
    const rb=u.role==='admin'?'<span class="rbadge radmin"><i class="fas fa-crown"></i> Admin</span>':'<span class="rbadge ruser"><i class="fas fa-user"></i> User</span>';
    return`<tr>
      <td><div class="uav">${init}</div></td>
      <td><b>${name}</b></td>
      <td style="color:var(--t2);font-size:13px">${u.email||'-'}</td>
      <td style="color:var(--t2)">${u.position||'-'}</td>
      <td style="color:var(--t2)">${u.department||'-'}</td>
      <td>${rb}</td>
      <td style="color:var(--t2);font-size:12.5px">${date}</td>
      <td><div class="act-col">
        <button class="btn bv" onclick="showUser('${u.id}')"><i class="fas fa-eye"></i> ดู</button>
        ${u.id!==currentUid?`<button class="btn ${u.role==='admin'?'bmu':'bma'}" onclick="toggleRole('${u.id}','${u.role}')">${u.role==='admin'?'<i class="fas fa-user-minus"></i> ลด User':'<i class="fas fa-crown"></i> เป็น Admin'}</button>`:''}"
      </div></td>
    </tr>`;
  }).join('');
}
window.filterU=function(){
  const q=document.getElementById('si').value.toLowerCase();
  renderTable(allUsers.filter(u=>(u.displayName||'').toLowerCase().includes(q)||(u.email||'').toLowerCase().includes(q)));
};
window.showUser=async function(uid){
  const u=allUsers.find(x=>x.id===uid);
  if(!u) return;
  document.getElementById('mAv').textContent=(u.displayName||'?').charAt(0).toUpperCase();
  document.getElementById('mName').textContent=u.displayName||'-';
  document.getElementById('mEmail').textContent=u.email||'-';
  document.getElementById('mPos').textContent=u.position||'-';
  document.getElementById('mDept').textContent=u.department||'-';
  document.getElementById('mRole').textContent=u.role==='admin'?'ผู้ดูแลระบบ':'ผู้ใช้งาน';
  document.getElementById('mDate').textContent=u.createdAt?.toDate?u.createdAt.toDate().toLocaleDateString('th-TH'):'-';
  document.getElementById('mAlert').innerHTML='';
  // Load travel stats
  try{
    const ts=await getDocs(query(collection(db,'travels'),where('userId','==',uid)));
    const tList=ts.docs.map(d=>d.data());
    document.getElementById('mAll').textContent=tList.length;
    document.getElementById('mPend').textContent=tList.filter(t=>t.status==='pending').length;
    document.getElementById('mAppr').textContent=tList.filter(t=>t.status==='approved').length;
  }catch(e){document.getElementById('mAll').textContent='—';}
  document.getElementById('mFooter').innerHTML=uid!==currentUid?`<button class="btn ${u.role==='admin'?'bmu':'bma'}" onclick="toggleRole('${uid}','${u.role}');closeModal()">${u.role==='admin'?'<i class="fas fa-user-minus"></i> ลดสิทธิ์เป็น User':'<i class="fas fa-crown"></i> เปลี่ยนเป็น Admin'}</button>`:
    '<span style="font-size:13px;color:var(--t2)"><i class="fas fa-info-circle"></i> นี่คือบัญชีของคุณ</span>';
  document.getElementById('uModal').classList.add('show');
};
window.toggleRole=async function(uid,curRole){
  const newRole=curRole==='admin'?'user':'admin';
  if(!confirm(`เปลี่ยนสิทธิ์เป็น ${newRole==='admin'?'Admin':'User'}?`)) return;
  try{
    await updateDoc(doc(db,'users',uid),{role:newRole});
    allUsers=allUsers.map(u=>u.id===uid?{...u,role:newRole}:u);
    document.getElementById('uCount').textContent=allUsers.length;
    renderTable(allUsers);
    const a=document.createElement('div');a.className='alert as';a.innerHTML=`<i class="fas fa-check-circle"></i>เปลี่ยนสิทธิ์เรียบร้อย`;document.getElementById('mAlert').appendChild(a);
  }catch(e){const a=document.createElement('div');a.className='alert ae';a.innerHTML='<i class="fas fa-exclamation-circle"></i>เกิดข้อผิดพลาด';document.getElementById('mAlert').appendChild(a);}
};
window.closeModal=function(){document.getElementById('uModal').classList.remove('show');};
window.doLogout=async function(){await signOut(auth);location.href='/bicc-ovec/login.php';};
</script></body></html>
