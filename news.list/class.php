<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class ListElementsComponent extends \CBitrixComponent
{
    /**
     * выполняет логику работы компонента
     */
    public function executeComponent()
    {
        try
        {
            $this->getResult();
            $this->includeComponentTemplate($this->page);
        }
        catch (Exception $e)
        {
            ShowError($e->getMessage());
        }
    }
    /**
     * получение результатов
     */
    protected function getResult()
    {
        $this->arResult['ITEMS']  =   'TEST';
    }
}