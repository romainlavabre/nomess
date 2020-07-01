# InteractConfig

The interactConfig component is used for modify your configuration, 
she'is written in hard.

For launch, you must use get method

*`get(string $filename): array`*

> Return an array contained all configuration for specified file

***$filename*** Specify the filename on App/Config/ and do not precise the extension


*`save(array $data): void`*

> Save your modifications

***$data*** Your configurations file


**Warning** This component writes hard in your configuration file, therefore, 
pay special attention to your modifications