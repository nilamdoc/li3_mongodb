
/** orders indexes **/
db.getCollection("orders").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** users indexes **/
db.getCollection("users").ensureIndex({
  "_id": NumberInt(1)
},[
  
]);

/** orders records **/
db.getCollection("orders").insert({
  "_id": ObjectId("50a48b619d5d0cdc09000001"),
  "cust_id": "abc123",
  "ord_date": ISODate("2012-11-02T17:04:11.102Z"),
  "status": "A",
  "price": 50,
  "items": [
    {
      "sku": "xxx",
      "qty": 25,
      "price": 1
    },
    {
      "sku": "yyy",
      "qty": 25,
      "price": 1
    }
  ]
});
db.getCollection("orders").insert({
  "_id": ObjectId("50a48b799d5d0cdc09000002"),
  "cust_id": "abc123",
  "ord_date": ISODate("2012-11-02T17:04:11.102Z"),
  "status": "A",
  "price": 75,
  "items": [
    {
      "sku": "xxx",
      "qty": 25,
      "price": 1
    },
    {
      "sku": "zzz",
      "qty": 50,
      "price": 1
    }
  ]
});
db.getCollection("orders").insert({
  "_id": ObjectId("50a48bbc9d5d0cdc09000003"),
  "cust_id": "xyz123",
  "ord_date": ISODate("2012-11-02T17:04:11.102Z"),
  "status": "A",
  "price": 75,
  "items": [
    {
      "sku": "zzz",
      "qty": 50,
      "price": 1
    },
    {
      "sku": "yyy",
      "qty": 25,
      "price": 1
    }
  ]
});

/** users records **/
db.getCollection("users").insert({
  "_id": ObjectId("50a5242f9d5d0cdc09000010"),
  "age": NumberInt(51),
  "name": "Nilam Doctor",
  "user_id": NumberInt(1),
  "status": "C"
});
db.getCollection("users").insert({
  "_id": ObjectId("50a5242f9d5d0cdc09000011"),
  "age": NumberInt(49),
  "name": "Parimal Doctor",
  "user_id": NumberInt(2),
  "status": "C"
});
db.getCollection("users").insert({
  "_id": ObjectId("50a5242f9d5d0cdc09000012"),
  "age": NumberInt(32),
  "name": "Ruchi Jain",
  "user_id": NumberInt(3),
  "status": "C"
});
db.getCollection("users").insert({
  "_id": ObjectId("50a5242f9d5d0cdc09000013"),
  "age": NumberInt(18),
  "name": "Hitarth Doctor",
  "user_id": NumberInt(4),
  "status": "D"
});
