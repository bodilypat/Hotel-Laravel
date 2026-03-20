Full-stack-Hotel-Management-System/
├── backend/   (Laravel)                           
│   │      
│   ├── app/     
│   │   ├── Http/  
│   │   │	├── Controllers/
│   │   │   │   └── API/
│   │   │	│       ├── AuthController.php
│   │   │	│       ├── RoomController.php
│   │   │	│       ├── BookingController.php
│   │   │	│       ├── PaymentController.php
│   │   │   │       └── Customer.php
│   │   │	├── Requests/  
│   │   │	│   ├── Auth/ 
│   │   │	│   │   ├── LoginRequest.php
│   │   │   │   │   └── RegisterRequest.php
│   │   │	│   ├── Room/
│   │   │	│   │   ├── StoreRoomRequest.php
│   │   │   │   │   └── UpdateRoomRequest.php
│   │   │	│   ├── Booking/
│   │   │	│   │   ├── StoreBookingRequest.php
│   │   │   │   │   └── UpdateBookingRequest.php
│   │   │	│   ├── Payment/
│   │   │   │   │   └── StorePaymentRequest.php
│   │   │	│   ├── Customer/
│   │   │   │   └── 
│   │   │   └── Middleware/
│   │   │	    ├── AdminMiddleware.php
│   │   │       └── AuthMiddleware.php
│   │   ├── Services/                             # Business Logic layer
│   │   │	├── BookingService.php
│   │   │	├── PaymentService.php
│   │   │	├── RoomService.php
│   │   │   └── 
│   │   ├── Models/                             
│   │   │	├── User.php
│   │   │	├── Room.php
│   │   │	├── Booking.php
│   │   │	├── Payment.php
│   │   │   └── 
│   │   ├── Repositories/                        # Data abstraction layer (optional but pro)
│   │   │	├── RoomRepository.php
│   │   │	├── BookingRepository.php
│   │   │	├── PaymentRepository.php
│   │   │   └── 
│   │   └── Providers/
│   │   	├── 
│   │       └── 
│   ├── config/    
│   │   ├── app.php
│   │   ├── database.php
│   │   └── service.php
│   ├── database/    
│   │   ├── Factories/
│   │   │	├── UserFactory.php
│   │   │	├── RoomFactory.php
│   │   │	├── BookingFactory.php
│   │   │	├── PaymentFactory.php
│   │   │   └── 
│   │   ├── Migrations/
│   │   │	├── 2026_03_20_000000_create_users_table.php
│   │   │	├── 2026_03_20_000001_create_rooms_table.php 
│   │   │	├── 2026_03_20_000002_create_bookings_table.php
│   │   │	├── 2026_03_20_000003_create_payments_table.php 
│   │   │   └── 
│   │   ├── Seeders/
│   │   │	├── DatabaseSeeder.php
│   │   │   └── 
│   │   └── schema.sql
│   ├── routes/    
│   │   ├── api.php
│   │   └── web.php
│   ├── storage/ 
│   ├── Bootstrap/ 
│   ├── public/    
│   │   └── index.php
│   ├── .env
│   └── server.js            
│  
├── frontend (React)    
│   ├── src/  
│   │   ├── public/                                  
│   │   │   └── index.html
│   │   ├── components
│   │   │   ├── ui/
│   │   │	│   ├── Button.jsx     
│   │   │	│   ├── Input.jsx
│   │   │	│   ├── Modal.jsx
│   │   │	│   ├── Table.jsx
│   │   │	│   ├── Badge.jsx          
│   │   │   │   └── Loader.jsx
│   │   │   ├── layout/                   
│   │   │	│   ├── Sidebar.jsx   
│   │   │	│   ├── Navber.jsx   
│   │   │   │   └── AdminLayout.jsx
│   │   │   ├── forms/
│   │   │	│   ├── Booking.jsx                
│   │   │	│   ├── RoomForm.jsx    
│   │   │	│   ├── CustomerForm.jsx      
│   │   │	│   ├── LoginForm.jsx  
│   │   │	│   ├── PaymentForm.jsx       
│   │   │	│   ├── FormField.jsx    
│   │   │   │   └── 
│   │   │   ├── tables/          
│   │   │	│   ├── RoomTable.jsx                                
│   │   │	│   ├── BookingTable.jsx
│   │   │	│   ├── CustomerTable.jsx
│   │   │	│   ├── StaffTable.jsx
│   │   │	│   ├── PaymentTable.jsx
│   │   │	│   ├── DataTable.jsx  
│   │   │   │   └── 
│   │   │ 	└── charts/                        
│   │   │	    ├── LineChar.jsx            
│   │   │	    ├── BarChart.jsx   
│   │   │	    ├── PieChart.jsx   
│   │   │	    ├── AreaChart.jsx   
│   │   │	    ├── DoughnutChart.jsx   
│   │   │	    ├── KPIwidget.jsx                 
│   │   │	    ├── ChartLegend.jsx           
│   │   │	    ├── ChartTooltip.jsx            
│   │   │	    ├── ChartSkeleton.jsx   
│   │   │       └── index.ts
│   │   │     
│   │   ├── pages/   
│   │   │   ├── dashboard.jsx
│   │   │   ├── logout.jsx                             
│   │   │   ├── auth/
│   │   │	│   ├── login.jsx
│   │   │	│   ├── register.jsx
│   │   │	│   ├── forgotPassword.jsx
│   │   │   │   └── resetPassword.jsx
│   │   │   ├── rooms/
│   │   │	│   ├── Rooms.jsx
│   │   │	│   ├── RoomForm.jsx
│   │   │   │   └── RoomRow.jsx
│   │   │   ├── bookings/
│   │   │	│   ├── Booking.jsx
│   │   │	│   ├── BookingForm.jsx
│   │   │   │   └── BookingDetails.jsx
│   │   │   ├── guests/
│   │   │   ├── billing/
│   │   │   ├── reports/
│   │   │   ├── components/
│   │   │   │   └── ProtectedRoutes.js
│   │   │   ├── services/
│   │   │   │   └── api.js
│   │   │   ├── 
│   │   │   └── 
│   │   │                             
│   │   ├── services/                               # API Logic (Axios, Fetch)
│   │   │   ├── api.js                                         
│   │   │   ├── authService.js 
│   │   │   ├── dashboardService.js 
│   │   │   ├── roomService.js
│   │   │   ├── bookingService.js
│   │   │   ├── billingService.js
│   │   │   └── reportService.js                  
│   │   ├── routes/                                
│   │   │   └── AppRoutes.jsx
│   │   ├── context/                                
│   │   │   └── AuthRoutes.jsx
│   │   ├── hooks/                                
│   │   │   └── useAuth.js
│   │   ├── styles/                                 # Global and module-based styles
│   │   │   ├── global.css
│   │   │   ├── layout.css
│   │   │   └── forms.css 
│   │   │
│   │   ├── App.jsx
│   │   └── main.jsx
│   └── package.json   
│
└── README.md
