# HttpSession

The HttpSession manager your session (security in particular)


#### Method

*`&getReference(mixed $index): mixed`*

> Return reference of the entry accociate to index, NULL if doesn't exists

<br>

*`get(mixed $index): mixed`*

> Return the value assiciate to index, Null if doesn't exists

<br>

*`set($key, $value, $reset = false): void`*

> Add value

`$reset` Delete value associate to the key before insertion

<br>

*`delete(string $index): void`*

> Delete the entry associate to index variable

<br>

*`setLifeTime(int $time, bool $force = false): void`*

> Modify the lifetime of cookie session

`$time` Time in second

`$force` Update the cookie even id the value of lifetime is equals to time variable

*`installSecurityModules(bool $userAgentSystem, bool $ticketSystem, bool $ipSystem, bool $bindTicketIp = false, ?array $recoveryConfig = null): void`*

> Installation of security module, valid for lifetime of session

`$userAgentSystem` if TRUE, the useragent will be controlled

`$ticketSystem` If TRUE, an ticket system will be initialize

`$ipSystem` If TRUE, the IP ADRESS will be controlled

`$bindTicketIp` If TRUE, add an felexibility for IP modules, if IP doesn't match but the ticket is valid, the connexion will be accepted

`$userAgentSystem`, bool $ipSystem]|null $recoveryConfig Array of secondary configuration in case of error from ticket modules (Client doesn't accept the cookie)
