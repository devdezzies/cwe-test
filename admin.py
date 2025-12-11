# create_user.py
from app import app, db, User

with app.app_context():
    db.create_all()
    
    admin = User(username='admin')
    admin.set_password('admin123')
    db.session.add(admin)
    db.session.commit()
    
    print("✅ User 'admin' berhasil dibuat!")