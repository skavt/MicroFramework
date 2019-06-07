<?php

namespace src\Templater;

class Template
{
    private $tags = [];
    private $template;
    public function render($templateFile)
    {
        $this->template = $this->getFile($templateFile);
        if(!$this->template) {
            return "Error! Can't load the template file $templateFile";
        }
        $this->replaceTags();
        echo $this->template;
    }

    public function set($tag, $value)
    {
        $this->tags[$tag] = $value;
    }

    public function getFile($file)
    {
        if(file_exists($file))
        {
            $file = file_get_contents($file);
            return $file;
        }
        else
        {
            return false;
        }
    }

    private function replaceTags()
    {
        foreach ($this->tags as $tag => $value) {
            $this->template = str_replace('{'.$tag.'}', $value, $this->template);
        }

        return true;
    }
}
