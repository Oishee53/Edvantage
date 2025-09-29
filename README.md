# 📚 Edvantage LMS  

Edvantage is a Learning Management System (LMS) that enables students, instructors, and admins to interact in a structured e-learning environment. It provides course creation, resource management, quizzes, progress tracking, Q&A, certifications, and secure role-based access.  

---

## 🚀 Key Features  

### 1. 🔐 Authentication and Authorization  
- User registration with personal details and login via email + password.  
- All users are registered as **students** by default.  
- Students can upgrade to **instructors** by providing additional details.  
- Role-based access control (**Student, Instructor, Admin**).  
- After login, users are redirected to their respective **dashboards**.  

---

### 2. 📘 Course and Resource Management  
- **Instructors** can create courses and upload resources (videos, PDFs, etc.).  
- After uploading lectures, courses are submitted for **admin approval**.  
- **Admins** can accept or reject courses, with notifications sent to instructors.  
- Once approved, instructors must add **quizzes** for all lectures before the course is published.  
- Quizzes include **multiple-choice questions** with correct answer setup.  
- **Restrictions:**  
  - Instructors cannot modify approved course resources (must contact admin).  
  - Admins can edit/delete approved content; instructors are notified of changes.  

---

### 3. 🎓 Course Exploration and Enrollment  
- Students can explore all available courses (**purchased courses hidden from catalog**).  
- Courses can be added to **wishlist** or **cart**.  
- Secure **checkout system** for purchasing.  
- Enrolled course content is available **lifetime**.  

---

### 4. 📊 Progress Tracking  
- Students can:  
  - Watch videos & read PDFs.  
  - Attempt quizzes (**only once per quiz**).  
- System tracks:  
  - Video progress by length watched.  
  - Quiz marks and performance.  
- Students can view their progress in real time.  

---

### 5. ❓ Question and Answer  
- Students can ask **course lecture-specific questions**.  
- Instructors receive notifications for new questions.  
- Students are notified once their query is answered.  

---

### 6. 🏆 Certification  
- Students receive a certificate after completing a course if:  
  - All videos are watched.  
  - At least **70% quiz score** is achieved.  
- Certificates include:  
  - **Unique verification link**.  
  - Validation against Edvantage’s database to ensure authenticity.  

---

### 7. 👩‍🎓 Other Student Features  
- Profile management.  
- Purchase history view.  
- Access to all enrolled courses.  
- Course progress tracking.  

---

## 🛠️ Tech Stack (suggested)  
> _(Update based on your actual implementation)_  
- **Backend:** Laravel / Node.js / Django  
- **Frontend:** React / Next.js / Vue.js  
- **Database:** MySQL / PostgreSQL / MongoDB  
- **Authentication:** JWT / Laravel Breeze / Passport  
- **Storage:** AWS S3 / Cloudinary (for video & PDF resources)  

---

