router.post('/add_eventmanagers', (req, res) => {
    var eventManeger = req.body; 

    let sql = 'select  UserId from tblusers where UserId = "'+eventManeger.ContactNo+'"  ';
    connection.query(sql , (err, rows, fields) => {

        if (!err){

            let data = [];
            if(rows.length == 0){

    var sql = "INSERT into tblusers ( UserName, UserId, Password , RoleId, Status ) values (?,?,?,?,?) ";
    var values = [eventManeger.ManagerName, eventManeger.ContactNo, bcrypt.hashSync(eventManeger.ContactNo) , 3, 1  ];
    let data = [];
    
    connection.query(sql, values, (err, result) => {
        if (!err)
        {
            var UserId = result.insertId;

            sql = "INSERT into tblcustomers (CustomerId, CustomerName, Age, Gender ) values (?,?,?,?)";
            values = [UserId, eventManeger.ManagerName, eventManeger.Age , eventManeger.Gender , eventManeger.ContactNo ];
            connection.query(sql, values);

            sql = "INSERT into tbladdress (UId, ContactNo, AlternateContactNo , Address,  Email ) values (?,?,?,?,?)";
            values = [UserId, eventManeger.ContactNo , eventManeger.AlternateContactNo, eventManeger.Address, eventManeger.Email ];
            connection.query(sql, values);

            sql = "insert into tblorgusers (UId, OrganizationId) values (?, ?)";
            values = [UserId, eventManeger.OrganizationId ];
            connection.query(sql, values);

            data = {"status":"SUCCESS","data": "Event Manager Registered " };
            res.send(data);
        }
        else
            console.log(err);
    })
        }
        else{
            data = {"status":"FAILED","data": "User Id Already Exists" };
            res.send(data);
        }

        }
        else
            console.log(err);

    });
});
