# LightPersists

The LightPersists is an light container of peristence, giving more flexibility that the session.
The cookie generated expires after ten years, keep cool, you have time.

Data is update when Distributor::forward is called (if you bind HttpResponse), so, if you encountered an 
error during treatment, the new data will be lost

The PersistsManager contains the identical method that [HttpSession](HttpSession.md) and have only one more:

*`purge(): void`*

> Delete the persistence file and cookie