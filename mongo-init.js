print('Start #################################################################');

db = db.getSiblingDB("admin");
// move to the admin db - always created in Mongo
db.auth("root", "password");
// log as root admin if you decided to authenticate in your docker-compose file...
db = db.getSiblingDB("mongo");
// create and move to your new database
db.createUser({
    "user": "root",
    "pwd": "example",
    "roles": [{
        "role": "dbOwner",
        "db": "mongo"
    }]}
);
// user created
// db.createCollection("collection_leads");
// add new collection