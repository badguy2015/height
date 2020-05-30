<?php
namespace Home\Controller;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;

Class TestFormController extends \core\base
{

    public function indexAction()
    {
//        $name = new Element('name');
//        $name->setLabel('Your name');
//        $name->setAttributes(array(
//            'type'  => 'text'
//        ));
//
//        $email = new Element\Email('email');
//        $email->setLabel('Your email address');
//
//        $subject = new Element('subject');
//        $subject->setLabel('Subject');
//        $subject->setAttributes(array(
//            'type'  => 'text'
//        ));
//
//        $message = new Element\Textarea('message');
//        $message->setLabel('Message');
//
////        $captcha = new Element\Captcha('captcha');
////        $captcha->setCaptcha(new Captcha\Dumb());
////        $captcha->setLabel('Please verify you are human');
//
//        $csrf = new Element\Csrf('security');
//
//        $send = new Element('send');
//        $send->setValue('Submit');
//        $send->setAttributes(array(
//            'type'  => 'submit'
//        ));
//
//
//        $form = new Form('contact');
//        $form->add($name);
//        $form->add($email);
//        $form->add($subject);
//        $form->add($message);
////        $form->add($captcha);
//        $form->add($csrf);
//        $form->add($send);
//
//        $nameInput = new Input('name');
//// configure input... and all others
//        $inputFilter = new InputFilter();
//// attach all inputs
//
//
//
//
//
//
//        $form->setInputFilter($inputFilter);
//        $this->assign('a','123');

//        $text = new Element\Text('my-text');
//        $text->setLabel('Enter your name');
//
//        $form = new Form('my-form');
//        $form->add($text);
//
//        $label = $form->get('my-text');
        $select = new Element\Select('language');
        $select->setLabel('Which is your mother tongue?');
        $arr = array(
            '0' => 'French',
            '1' => 'English',
            '2' => 'Japanese',
            '3' => 'Chinese',
        );
        $select->setValueOptions($arr);
//        $select->setOption('value_options',$arr);

        $form = new Form('language');
        $form->add($select);

        $label = $form->get('language');


        dump($label);
        dump($label->getValueOptions());

        $this->assign('form',$form);
        $this->display();
    }

    public function testSomeElementAction()
    {
        // 创建元素（text,select,checkbox等）

        /**
         * 1.<select> 元素（下拉列表）
         * <select name="cars">
         * <option value="volvo">Volvo</option>
         * <option value="saab">Saab</option>
         * <option value="fiat">Fiat</option>
         * <option value="audi">Audi</option>
         * </select>
         *
         * 2.<textarea> 元素定义多行输入字段（文本域）
         * <textarea name="message" rows="10" cols="30">
         * The cat was playing in the garden.
         * </textarea>
         *
         * 3.<button> 元素定义可点击的按钮
         * <button type="button" onclick="alert('Hello World!')">Click Me!</button>
         *
         *
         * 4.<input> text/password/submit/radio/checkbox/button
         * 4.<input> /password/submit///button
         * 密码字段
         * <input type="password">
         *
         * 单选按钮（Radio Buttons）
         * <input type="radio" name="sex" value="male">Male<br>
         * <input type="radio" name="sex" value="female">Female
         *
         * 复选框（Checkboxes）
         * <input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
         * <input type="checkbox" name="vehicle" value="Car">I have a car
         *
         * 输入类型：submit
         * 输入类型：password
         *
         *
         *
         *
         **/

//        dump('$_GET:',$_GET);
//        dump('$_POST:',$_POST);
        echo '<hr>';
        $id = new Element\Text('id');
//        $id->setValue('zhangSan');
        $id->setLabel('abc');

        $form = new Form('searcherForm');
        $form->add($id);

        $view = $this->getViewModel();
        $view->testA = 'tesAAA';
        $view->setTemplate('/Home/View/TestForm/testSomeElement');
//        $view->setTemplate('/admin/marketing/exchange/itemList');
        dump($view);
        return $view;
        $this->assign('form',$form);
        $this->display();
    }

    protected $viewModel;
    /**
     * 取ViewModel
     * @return \Zend\View\Model\ViewModel
     */
    protected function getViewModel()
    {
        $view = new Zend_View();
        $view->setScriptPath('/application/views/scripts');

        $layout = new Zend_Layout();
        $layout->setLayoutPath('/application/layouts/scripts');
        $layout->setView($view);

        Zend_Registry::getInstance()->set('layout', $layout);

        if (!$this->viewModel instanceof \Zend\View\Model\ViewModel) {
            $this->viewModel = new \Zend\View\Model\ViewModel();
        }
        return $this->viewModel;
    }




}



