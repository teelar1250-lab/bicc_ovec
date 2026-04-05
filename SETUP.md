# BICC OVEC — คู่มือตั้งค่าระบบ

## 1. ตั้งค่า Firebase Firestore Rules

ไปที่ **Firebase Console → Firestore Database → Rules** แล้วใส่:

```
rules_version = '2';
service cloud.firestore {
  match /databases/{database}/documents {

    // Users collection
    match /users/{userId} {
      allow read: if request.auth != null && (
        request.auth.uid == userId ||
        get(/databases/$(database)/documents/users/$(request.auth.uid)).data.role == 'admin'
      );
      allow create: if request.auth != null && request.auth.uid == userId;
      allow update: if request.auth != null && (
        request.auth.uid == userId ||
        get(/databases/$(database)/documents/users/$(request.auth.uid)).data.role == 'admin'
      );
    }

    // Travels collection
    match /travels/{travelId} {
      allow read: if request.auth != null && (
        resource.data.userId == request.auth.uid ||
        get(/databases/$(database)/documents/users/$(request.auth.uid)).data.role == 'admin'
      );
      allow create: if request.auth != null;
      allow update: if request.auth != null && (
        resource.data.userId == request.auth.uid ||
        get(/databases/$(database)/documents/users/$(request.auth.uid)).data.role == 'admin'
      );

      // Documents sub-collection
      match /documents/{docId} {
        allow read, write: if request.auth != null;
      }
    }
  }
}
```

## 2. ตั้งค่า Firebase Storage Rules

ไปที่ **Firebase Console → Storage → Rules** แล้วใส่:

```
rules_version = '2';
service firebase.storage {
  match /b/{bucket}/o {
    match /travels/{travelId}/{allPaths=**} {
      allow read, write: if request.auth != null;
    }
  }
}
```

## 3. สร้าง Admin คนแรก

เนื่องจาก User ที่สมัครใหม่จะได้ role = 'user' ทั้งหมด  
ต้องตั้ง Admin คนแรกด้วยตนเอง:

1. สมัครสมาชิกผ่าน `/bicc-ovec/register.php`
2. ไปที่ **Firebase Console → Firestore Database → users**
3. หา document ของ user ที่ต้องการเป็น Admin
4. แก้ไข field `role` จาก `"user"` เป็น `"admin"`
5. กลับมา Refresh หน้า — จะถูก redirect ไป Admin Dashboard

## 4. สั่งรัน XAMPP

1. เปิด **XAMPP Control Panel**
2. Start **Apache**
3. เปิด browser ไปที่: `http://localhost/bicc-ovec/`

## 5. โครงสร้างไฟล์

```
htdocs/bicc-ovec/
├── index.php            ← Redirect ไป login
├── login.php            ← หน้า Login
├── register.php         ← หน้าสมัครสมาชิก
├── assets/
│   └── logo.png         ← โลโก้ BICC OVEC
├── user/
│   ├── dashboard.php    ← Dashboard ผู้ใช้
│   ├── travel_form.php  ← ฟอร์มไปราชการ (Process 1)
│   ├── upload.php       ← อัปโหลดเอกสาร (Process 2)
│   └── travel_detail.php← รายละเอียด
└── admin/
    ├── dashboard.php    ← Dashboard Admin + กราฟ
    ├── travel_detail.php← รายละเอียด + อนุมัติ
    └── users.php        ← จัดการผู้ใช้
```

## 6. คุณสมบัติหลักของระบบ

| ฟีเจอร์ | User | Admin |
|---------|------|-------|
| เพิ่มการไปราชการ | ✅ | — |
| แก้ไข (เฉพาะสถานะ pending) | ✅ | — |
| อัปโหลดเอกสาร/รูปภาพ/PDF | ✅ | — |
| ดูรายการของตัวเอง | ✅ | — |
| ดูรายการทุกคน | ❌ | ✅ |
| อนุมัติ / ปฏิเสธ | ❌ | ✅ |
| กราฟสถิติ | ❌ | ✅ (Pie Chart) |
| จัดการสิทธิ์ผู้ใช้ | ❌ | ✅ |
