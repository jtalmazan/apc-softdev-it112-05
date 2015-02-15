class UserController extends Controller
{
  public function filters()
  {
    return array(
        'accessControl',
    );
  }
  
  public function accessRules()
  {
    return array(
      array(
        'deny',
        'actions'=>array('ChangePassword'),
        // Denegar a usuarios anónimos.
        'users'=>array('?'),
        // Solo disponible para autenticacion con MySQL
        'expression'=>"Yii::app()->params['authSystem']['type'] === 'MySqlUserIdentity'",
      ),
    );
  }
 
 public function actionChangePassword()
  {
    $model = new ChangePasswordForm;
    if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
    {
      echo CActiveForm::validate($model);
      Yii::app()->end();
    }

    // collect user input data
    if(isset($_POST['ChangePasswordForm']))
    {
      $model->attributes=$_POST['ChangePasswordForm'];
      // Validar input del usuario y cambiar contraseña.
      if($model->validate() && $model->changePassword())
      {
       Yii::app()->user->setFlash('success', '<strong>Éxito!</strong> Su contraseña fue cambiada.');
       $this->redirect( $this->action->id );
      }
    }
    // Mostrar formulario de cambio de contraseña.
    $this->render('changePassword',array('model'=>$model));
  }
}