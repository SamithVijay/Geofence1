# from flask import Flask, render_template, jsonify, request

# app = Flask(__name__)

# # Sample data for demonstration (in a real scenario, data would come from a database)
# vehicle_list = [
#     {"id": "V123", "rto": "MH01AB1234", "vehicle_type": "Car", "disp_name": "Vehicle A", "driver_name": "John Doe", "city": "Mumbai", "sim": "1234567890"},
#     {"id": "V124", "rto": "MH02CD5678", "vehicle_type": "Truck", "disp_name": "Vehicle B", "driver_name": "Jane Smith", "city": "Pune", "sim": "0987654321"}
# ]

# # Home route to render the main immobilizer page
# @app.route('/')
# def immobilizer_page():
#     return render_template('immobilizer.html', vehicle_list=vehicle_list, page_title="Immobilizer Control")

# # API route to get the schedule list (for demonstration; replace with database call)
# @app.route('/get_schedules', methods=['GET'])
# def get_schedules():
#     schedule_list = [
#         {"id": 1, "schedule_name": "Maintenance", "date_time": "2023-12-01 10:00", "vehicles": "5", "event": "Checkup", "status": "Scheduled"},
#         {"id": 2, "schedule_name": "Inspection", "date_time": "2023-12-15 14:00", "vehicles": "3", "event": "Inspection", "status": "Completed"}
#     ]
#     return jsonify(schedule_list)

# if __name__ == '__main__':
#     app.run(debug=True)





# 2nd code     

from flask import Flask, render_template, jsonify, request

app = Flask(__name__)

# Sample data to simulate data from the database
users_list = [
    {"id": 1, "name": "Company A"},
    {"id": 2, "name": "Company B"},
]

geofence_list = [
    {"id": 1, "name": "Geofence 1"},
    {"id": 2, "name": "Geofence 2"},
]

vehicle_list = [
    {"id": 1, "rto": "KA01AB1234"},
    {"id": 2, "rto": "KA02BC5678"},
]

geofenceassign_list = [
    {
        "id": 1,
        "rule_name": "Rule 1",
        "gf_array": "Geofence 1",
        "vehicle_array": "KA01AB1234",
        "method": "in",
        "mobile_array": "1234567890",
    },
]

@app.route('/')
def index():
    page_title = "Geofence Assignment"
    return render_template('geoassign.html', page_title=page_title,
                           users_list=users_list,
                           geofence_list=geofence_list,
                           vehicle_list=vehicle_list,
                           geofenceassign_list=geofenceassign_list)


# API endpoint to handle form submission
@app.route('/save-geoassign', methods=['POST'])
def save_geoassign():
    # Placeholder for saving the geofence assignment data
    data = request.json
    # Save the data as needed in your database
    return jsonify({"status": "success", "message": "Data saved successfully!"})


if __name__ == '__main__':
    app.run(debug=True)
