<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class TestElementsComponent extends \CBitrixComponent
{
    /**
     * шаблоны путей по умолчанию
     * @var array
     */
    protected $defaultUrlTemplates404 = array();

    /**
     * переменные шаблонов путей
     * @var array
     */
    protected $componentVariables = array();

    /**
     * страница шаблона
     * @var string
     */
    protected $page = '';

    /**
     * выполняет логику работы компонента
     */
    public function executeComponent()
    {
        try
        {
            $this->setSefDefaultParams();
            $this->getResult();
            $this->includeComponentTemplate($this->page);
        }
        catch (Exception $e)
        {
            ShowError($e->getMessage());
        }
    }
    /**
     * определяет переменные шаблонов и шаблоны путей
     */
    protected function setSefDefaultParams()
    {
        $this->defaultUrlTemplates404 = array(
            'list' => 'index.php',
            'detail' => '#ELEMENT_CODE#/'
        );
        $this->componentVariables = array('IBLOCK_ID','ELEMENT_CODE');
    }
    /**
     * получение результатов
     */
    protected function getResult()
    {

        $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
            $this->defaultUrlTemplates404,
            $this->arParams['SEF_URL_TEMPLATES']
        );

        $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
            $this->defaultUrlTemplates404,
            $this->arParams['VARIABLE_ALIASES']
        );

        $componentPage = CComponentEngine::ParseComponentPath(
            $this->arParams['SEF_FOLDER'],
            $arUrlTemplates,
            $this->componentVariables
        );

        if (strlen($componentPage) <= 0) {
            $componentPage = 'index';
        }

        CComponentEngine::InitComponentVariables(
            $componentPage,
            $this->componentVariables,
            $arVariableAliases,
            $this->componentVariables);


        $this->arResult['ITEMS']  =   'TEST';
        $this->page =   $componentPage;

    }

}