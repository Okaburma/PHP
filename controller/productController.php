<?php
require_once "../helper/database.php";

class productController extends DB{
    public function index(){
        try{
             /* data တွေ အပြင်ထုတ်မယ် */
             $statement = $this->pdo->query("select * from products");
             /* $statement က object ဖြစ်သွားပြီ.ထုတ်ရင် Array ပုံစံ..အခု products တွေထုတ်ချင်တာဆိုတော့  */
             $products = $statement->fetchAll(PDO::FETCH_OBJ);
             /* Fetch_Obj နဲ့ လုပ်လိုက်တော့ Array ခန်းက နေ key နဲ့ ထုတ်ကြည့်လို့ပြီ...... */
            //  echo json_encode($products[0]->name);
            //  echo "<br>";
            //  var_dump($products);
            return $products;
    
         }catch(Exception $e){
             echo $e->getMessage();
         }     
    }
    public function store($request){
        try{
            // var_dump($_POST);
            /* Database ထဲကို  Data ထည့် တာ==> ပထမအဆင့် queryString တည်ဆောက်*/
            $statement = $this->pdo->prepare("
            insert into products
                (name, price, stock, category, created_at, updated_at)
            values
                (:name, :price, :stock, :category, now(), now())                
            ");
            /* ဒုတိယအဆင့် BindParam လုပ် ,create.php က $_POST နဲ့ ပို့လိုက်တဲ့ data က ဒီ method ထဲမှာ Param အဖြစ် ဝင်မယ် */
            $statement->bindParam(":name",$request["name"]);
            $statement->bindParam(":price",$request["price"]);
            $statement->bindParam(":stock",$request["stock"]);
            $statement->bindParam(":category",$request["category"]);
            /* တတိယအဆင့် Execute လုပ်===>ဖြစ်မဖြစ်သိချင်လို့ if နဲ့ စစ် */
           if( $statement->execute()){
                /* ====index.php က database ကိုကြည့်တာနဲ့ အတူတူဘဲ==== */
                header("Location: http://localhost:8000/products");
           }else{
                throw new Exception("Error while creating to database");
           }
        }catch(Exception $e){
            echo $e->getMessage();
        }

    }
    public function edit($id){
        try{
            /* data ပြင်ချင်တာဆိုတော့ query အစား prepare */
            $statement = $this->pdo->prepare("select * from products where id = :id");
            /* bindParam သည် prepare လုပ်မှရသည် */
            $statement->bindParam(":id",$id);
            if($statement->execute()){
            $product = $statement->fetch(PDO::FETCH_OBJ);
            return $product;
            }else{
                throw new Exception ("Error at Edit Data!");
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }            
    }
    public function update($request,$id){
        try{
            $statement = $this->pdo->prepare("
              update products
                  set 
                      name = :name,
                      price = :price,
                      stock = :stock,
                      category = :category,
                      created_at = :created_at,
                      updated_at = now()
                  where id = :id                   
            ");
            /* ဒုတိယအဆင့် BindParam လုပ် */
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$request["name"]);
            $statement->bindParam(":price",$request["price"]);
            $statement->bindParam(":stock",$request["stock"]);
            $statement->bindParam(":category",$request["category"]);
            $statement->bindParam(":created_at",$request["created_at"]);
            /* တတိယအဆင့် Execute လုပ်===>ဖြစ်မဖြစ်သိချင်လို့ if နဲ့ စစ် */
           if( $statement->execute()){
                /* ====index.php က database ကိုကြည့်တာနဲ့ အတူတူဘဲ==== */
                header("Location: http://localhost:8000/products");
           }else{
                throw new Exception("Error while Updating Data");
           }
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function destroy($id){
        try{
            /* Database ထဲကို  Dataကို အောက်မှာ Bind လုပ်ထားတဲ့ :id နဲ့ ချိတ် ပြီး ဖျတ်တာ*/
            $statement = $this->pdo->prepare("delete from products where id = :id");
            /* ပထမအဆင့် delete button က id နဲ့ BindParam လုပ် */
            $statement->bindParam(":id",$id);
            /* တတိယအဆင့် Execute လုပ်===>ဖြစ်မဖြစ်သိချင်လို့ if နဲ့ စစ် */
           if( $statement->execute()){
                /* ====index.php က database ကိုကြည့်တာနဲ့ အတူတူဘဲ==== */
                header("Location: http://localhost:8000/products");
           }else{
                throw new Exception("Error while deleting to Data");
           }
        }catch(Exception $e){
            echo $e->getMessage();
        }        
    }
}

?>