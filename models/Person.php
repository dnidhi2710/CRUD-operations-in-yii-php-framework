<?
namespace app\models;

use yii\db\ActiveRecord;
// same name as table name and class name
class Person extends ActiveRecord{
    // same name as table columns
    private $firstname;
    private $lastname;
    private $email;
    private $image;
    private $marks;
    private $status;

    public function rules(){
        return [
            [['firstname','lastname','email','image','marks','status'],'required'],
            ['email', 'email'],
            [['image'],'file','extensions'=>'jpeg,png']
        ];
    }
}
