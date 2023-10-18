<?php


class AddVenueController extends PageController
{
    public function process(): void
    {
        // TODO: Implement process() method.
        $request=$this->getRequest();
        try {
            $name=$request->getProperty('venue_name');
            if (is_null($request->getProperty('submitted')))
            {
                $request->addFeedback("Укажите название заведения");
                $this->render(__DIR__.'/view/add_venue.php',$request);
            }
            elseif (is_null($name))
            {
                $request->addFeedback("Название- обязательное поле");
                $this->render(__DIR__.'/view/add_venue.php',$request);
                return;
            }
            else
            {
                $this->forward('lostvenues.php');
            }
        }
        catch (Exception)
        {
            $this->render(__DIR__.'/view/error.php',$request);
        }
    }
}