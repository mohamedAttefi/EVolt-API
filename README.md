# API Documentation

## Overview
This API provides endpoints for managing users, charging stations, reservations, and charging sessions. It is built using Laravel and follows RESTful principles.

---

## Authentication
The API uses Laravel Sanctum for authentication. Clients must include a Bearer token in the `Authorization` header for protected routes.

Example:
```
Authorization: Bearer <your_token>
```

---

## Endpoints

### Users

#### Register
**POST** `/api/register`
- **Description**: Register a new user.
- **Request Body**:
  ```json
  {
    "name": "string",
    "email": "string",
    "password": "string",
    "password_confirmation": "string"
  }
  ```
- **Response**:
  ```json
  {
    "user": {
      "id": 1,
      "name": "string",
      "email": "string"
    },
    "token": "string"
  }
  ```

#### Login
**POST** `/api/login`
- **Description**: Authenticate a user and return a token.
- **Request Body**:
  ```json
  {
    "email": "string",
    "password": "string"
  }
  ```
- **Response**:
  ```json
  {
    "user": {
      "id": 1,
      "name": "string",
      "email": "string"
    },
    "token": "string"
  }
  ```

---

### Reservations

#### List Reservations
**GET** `/api/reservations`
- **Description**: Retrieve a paginated list of reservations.
- **Response**:
  ```json
  {
    "reservations": [
      {
        "id": 1,
        "user_id": 1,
        "charging_station_id": 1,
        "start_time": "datetime",
        "end_time": "datetime"
      }
    ]
  }
  ```

#### Create Reservation
**POST** `/api/reservations`
- **Description**: Create a new reservation.
- **Request Body**:
  ```json
  {
    "user_id": 1,
    "charging_station_id": 1,
    "start_time": "datetime",
    "end_time": "datetime"
  }
  ```
- **Response**:
  ```json
  {
    "reservation": {
      "id": 1,
      "user_id": 1,
      "charging_station_id": 1,
      "start_time": "datetime",
      "end_time": "datetime"
    }
  }
  ```

---

### Charging Stations

#### List Charging Stations
**GET** `/api/charging-stations`
- **Description**: Retrieve a list of charging stations.
- **Response**:
  ```json
  [
    {
      "id": 1,
      "name": "string",
      "location": "string"
    }
  ]
  ```

---

### Charging Sessions

#### Start Charging Session
**POST** `/api/charging-sessions`
- **Description**: Start a new charging session.
- **Request Body**:
  ```json
  {
    "reservation_id": 1
  }
  ```
- **Response**:
  ```json
  {
    "session": {
      "id": 1,
      "reservation_id": 1,
      "start_time": "datetime"
    }
  }
  ```

#### End Charging Session
**PATCH** `/api/charging-sessions/{id}`
- **Description**: End an active charging session.
- **Response**:
  ```json
  {
    "session": {
      "id": 1,
      "reservation_id": 1,
      "start_time": "datetime",
      "end_time": "datetime"
    }
  }
  ```

---

## Error Handling
Errors are returned in the following format:
```json
{
  "message": "string",
  "errors": {
    "field_name": ["error_message"]
  }
}
```

---

## Notes
- All date/time fields use ISO 8601 format.
- Ensure proper authentication for protected routes.
- Use the provided `StoreReservationRequest` and `UpdateReservationRequest` classes for validation.