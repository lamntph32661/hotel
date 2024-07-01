<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $conn;
    protected $tableName;
    protected $primaryKey = "id";
    protected $sqlBuilder;
    public function __construct()
    {
        $host = HOST;
        $username = USERNAME;
        $password = PASSWORD;
        $dbname = DBNAME;
        try {
            $this->conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
        }
    }
    //Phương thức all để lấy ra toàn bộ dữ liệu của 1 bảng
    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    
    /**
     * Phương thức find dùng để lấy 1 dữ liệu theo id
     * @param $id: khóa của bảng
     */
    public static function find($id)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$model->primaryKey`=:$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //Đưa dữ liệu chứa tham số vào 1 mảng
        $data = ["$model->primaryKey" => $id];
        $stmt->execute($data);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0];
        }
        return $result; //không có dữ liệu
    }
    /**
     * Phương thức insert để thêm dữ liệu
     * @param $data: là 1 mảng dữ liệu có key và value
     * Trong đó key: là tên của cột
     * value: là giá trị tương ứng
     */
    public static function insert($data)
    {
        $model = new static;

        $columnNames = ""; //Dùng để lưu trữ tên cột của câu lệnh SQL
        $paramName = ""; //Dùng để lưu trữ tham số của câu lệnh SQL

        foreach ($data as $key => $value) {
            $columnNames .= "`$key`, ";
            $paramName .= ":$key, ";
        }

        //Xóa dấu ", " trong $columnNames và $paramName
        $columnNames = rtrim($columnNames, ", ");
        $paramName = rtrim($paramName, ", ");

        //Hoàn thiện câu lệnh SQL INSERT
        $model->sqlBuilder = "INSERT INTO $model->tableName( $columnNames ) VALUES( $paramName )";

        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute($data);
        //trả lại giá trị khóa vừa thêm
        return $model->conn->lastInsertId();
    }

    /**
     * Phương thức update để cập nhật dữ liệu của 1 bảng
     * @param $id khóa chính
     * @param $data mảng dữ liệu cần update; mảng phải là mảng liên hợp có key là tên cột, value tương ứng
     */
    public static function update($id, $data)
    {
        $model = new static;
        $model->sqlBuilder = "UPDATE $model->tableName SET ";

        foreach ($data as $key => $value) {
            $model->sqlBuilder .= "`$key`=:$key, ";
        }

        $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
        //Thêm điều kiện để cập nhật
        $model->sqlBuilder .= " WHERE $model->primaryKey=:$model->primaryKey";

        //Thêm $id vào data
        $data["$model->primaryKey"] = $id;
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute($data);
    }

    /**
     * Phương thức delete dùng để xóa dữ liệu theo id
     * @param $id: giá trị id cần xóa
     */
    public static function delete($id)
    {
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE $model->primaryKey=:$model->primaryKey";
        $stmt = $model->conn->prepare($model->sqlBuilder);

        //Truyền tham số
        $stmt->bindParam(":$model->primaryKey", $id);
        $stmt->execute();
    }

    /**
     * Phương thức where lấy dữ liệu theo điều kiện
     * @param $column: tên cột
     * @param $codition: điều kiện
     * @param $value: giá trị
     */
    public static function where($column, $codition, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $codition '$value'";
        return $model;
    }
    /**
     * phương andWhere để thêm điều kiện and vào sql
     * @param $column: tên cột
     * @param $codition: điều kiện
     * @param $value: giá trị
     */
    public function andWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " AND `$column` $codition '$value'";
        return $this;
    }
    public function orWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " OR `$column` $codition '$value'";
        return $this;
    }
    /**
     * Phương thức get để thực thi sql và lấy dữ liệu
     */
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
 /**
 * Hàm thực hiện inner join giữa 2 hoặc nhiều bảng
 *
 * @param $table1: Tên bảng thứ nhất
 * @param $column1: Tên cột liên kết của bảng thứ nhất
 * @param $table2: Tên bảng thứ hai
 * @param $column2: Tên cột liên kết của bảng thứ hai
 * @param $selects: Mảng các cột cần lấy (từ cả 2 bảng)
 * @param $where: Mảng điều kiện where (tùy chọn)
 *
 * @return array: Kết quả truy vấn
 */
public static function innerJoin($table1, $column1, $table2, $column2, $selects, $where = []) {
    $model = new static;

    // Xây dựng câu lệnh SQL inner join
    $model->sqlBuilder = "SELECT ";
    foreach ($selects as $select) {
        $model->sqlBuilder .= "$table1.$select, ";
    }
    $model->sqlBuilder = rtrim($model->sqlBuilder, ", ");
    $model->sqlBuilder .= " FROM $table1 INNER JOIN $table2 ON $table1.$column1 = $table2.$column2";

    // Thêm điều kiện WHERE nếu có
    if (!empty($where)) {
        $model->sqlBuilder .= " WHERE ";
        foreach ($where as $key => $value) {
            $model->sqlBuilder .= "$key = '$value' AND ";
        }
        $model->sqlBuilder = rtrim($model->sqlBuilder, " AND ");
    }

    // Thực thi truy vấn và trả về kết quả
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
public static function innerJoinBase($command) {
    $model = new static;

    $model->sqlBuilder=$command;

    // Thực thi truy vấn và trả về kết quả
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
}
public static function innerJoin3($CheckInDate='', $CheckOutDate='') {
    $model = new static;

    $model->sqlBuilder='SELECT r.id as IDRoom, r.Status, r.RoomNumber,rt.id, rt.Name, rt.PricePerNight, rt.MaxPerson, rt.Image, rt.PricePerNight, rt.TypeBed, rt.Extensions 
    FROM Room r JOIN RoomType rt ON r.RoomType = rt.id 
    LEFT JOIN Booking b ON r.id = b.RoomID';
if ($CheckInDate!=''&&$CheckOutDate!='') {
    $model->sqlBuilder.=' AND ("'.$CheckInDate.'" < b.CheckOutDate AND "'.$CheckOutDate.'" > b.CheckInDate)
     WHERE b.ID IS NULL; ';
}
    // Thực thi truy vấn và trả về kết quả
    $stmt = $model->conn->prepare($model->sqlBuilder);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_CLASS);
    return $result;
}

}


?>
