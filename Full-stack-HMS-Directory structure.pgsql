Full-stack-Hotel-Management-System/
├── backend/   (Laravel)                           
│   │      
│   ├── app/    
│   │   ├── config/                                        
│   │   │  	├── dbConnect.php
│   │   │  	└── 
│   │   │ 
│   │   ├── Http/  
│   │   │	├── Controllers/
│   │   │	│   ├── AuthController.php
│   │   │	│   ├── RoomController.php
│   │   │	│   ├── BookingController.php          
│   │   │	│   ├── PaymentController.php
│   │   │   │   └── 
│   │   │	├── Requests/  
│   │   │	│   ├── AuthRequest.php 
│   │   │	│   ├── RoomRequest.php
│   │   │	│   ├── BookingRequest.php
│   │   │	│   ├── PaymentRequest.php
│   │   │	│   ├── Customer.php
│   │   │   │   └── 
│   │   │	├── Middleware/   
│   │   │   ├── 
│   │   │   └── 
│   │   └── Models/
│   │   	├── User.php
│   │    	├── Room.php
│   │   	├── Booking.php   
│   │   	├── Payment.php
│   │   	├── Customer.php
│   │       └── 
│   ├── database/    
│   │   ├── Factories/
│   │   │	├── userFactory.php
│   │   │	├── RoomFactory.php
│   │   │	├── BookingFactory.php
│   │   │	├── PaymentFactory.php
│   │   │   └── 
│   │   ├── Migrations/
│   │   │	├── Booking.php   
│   │   │	├── Payment.php
│   │   │	├── Customer.php
│   │   │	├── payment.php
│   │   │   └── 
│   │   └── web.php
│   ├── routes/    
│   │   ├── api.php
│   │   └── web.php
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
