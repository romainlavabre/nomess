<?php

namespace NoMess\Core;

class BuildRoutes{
    /**
     * Chemin d'enregistrement du cache
     *
     * @var string
     */
    private $pathRegister;

    /**
     * Tableau des routes
     *
     * @var array
     */
    private $tabRoute = array();

    public function __construct(string $path)
    {
        $this->pathRegister = $path;
    }

    public function build()
    {
        $this->reflector();
        $content = $this->getContent();

        if(!file_put_contents($this->pathRegister, $content)){
            throw new WorkException("Impossible d'enregistrer le build en cache");
        }

        return;
    }

    private function getContent() : string
    {
        $content = "<?xml version=\"1.0\" encoding=\"utf-8\" ?>\n\n<config>\n";
        foreach($this->tabRoute as $value){
            $content = $content . "\t<routes url=\"" . $value->getUrl() . "\">\n\t\t<controller>" . $value->getController() . "</controller>\n\t\t<get action=\"" . $value->getGet() . "\"/>\n\t\t<post action=\"" . $value->getPost() . "\"/>\n\t</routes>\n";
        }

        $content = $content . "</config>";

        return $content;

    }

    private function reflector() : void
    {
        $tabContent = scandir('Api/src/Controllers');

        foreach($tabContent as $value){
            
            if(@is_file('Api/src/Controllers/' . $value)){
                $className = $this->getClassName('Api/src/Controllers/' . $value);

                $refle = new \ReflectionClass("App\\Controllers\\" . $className);

                $tabMethod = $refle->getMethods();

                foreach($tabMethod as $value){
                    
                    foreach($value as $method){
                        if(!strpos($method, "\\")){
                            $doc = $refle->getMethod($method)->getDocComment();

                            if(!empty($doc)){
                                $route_exist = strpos($doc, '@Route');

                                if($route_exist !== false){
                                    $floorOne = explode('{', $doc);
                                    $floorTwo = explode('}', $floorOne[1]);
                                    $floorThree = explode(',', $floorTwo[0]);
                                    $url = str_replace('"', '', $floorThree[0]);
                                    $prot = str_replace('"', '', $floorThree[1]);

                                    $fonction = $method;

                                    $route = arrayByKey(trim($url), $this->tabRoute);

                                    if(is_null($route) || empty($route)){
                                        $route = new Routes();
                                    }

                                    $route->setUrl($url);
                                    $route->setController($className);

                                    if(isset($floorThree[2])){
                                        $route->setGet($fonction);
                                        $route->setPost($fonction);
                                    }else if(trim($prot) === "GET"){
                                        $route->setGet($fonction);
                                    }else if(trim($prot) === "POST"){
                                        $route->setPost($fonction); 
                                    }


                                    $this->tabRoute[trim($url)] = $route;
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    private function getClassName($path) : string
    {
        if(@$file = file($path)){
            foreach($file as $line){
                $exist = strpos($line, 'class');

                if($exist !== false){
                    
                    $tab = explode(' ', $line);

                    $i = 0;

                    foreach($tab as $value){
                        if($value === 'class'){
                            return $tab[$i + 1];
                        }

                        $i++;
                    }
                }
            }

            throw new WorkException('Le nom de la class n\'a pas été résolue dans le fichier ' . $path . ' pour la method BuildRoutes::getClassName');
        }else{
            throw new WorkException('Le fichier ' . $file . ' n\'a pas été résolue dans la method BuildRoutes::getClassName');
        }
    }   
}