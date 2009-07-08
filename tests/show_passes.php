<?php
class ShowPasses extends HtmlReporter 
{
    
    function ShowPasses() 
	{
        $this->HtmlReporter();
    }
    
    function paintPass($message) 
	{
        parent::paintPass($message);
        print "<br/>";
        print "<span class=\"pass\">Pass</span>: ";
        $breadcrumb = $this->getTestList();
        array_shift($breadcrumb);
        print implode("-&gt;", $breadcrumb);
        print "-&gt;$message<br />\n\n";
    }
}
?>