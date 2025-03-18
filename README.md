# logged-users-asterisk
Small PHP function to get all logged in extensions on Asterisk server. Runs on the ad-hoc web server of almost any web-managed PBX server, such as FreePBX or IssabelPBX.

-----
## How it works
With the following command:

`asterisk -rx "pjsip show endpoints" 2>&1`

Asterisk returns all accounts and it's states:

```
 Endpoint:  <Endpoint/CID.....................................>  <State.....>  <Channels.>
    I/OAuth:  <AuthId/UserName...........................................................>
        Aor:  <Aor............................................>  <MaxContact>
      Contact:  <Aor/ContactUri..........................> <Hash....> <Status> <RTT(ms)..>
  Transport:  <TransportId........>  <Type>  <cos>  <tos>  <BindAddress..................>
   Identify:  <Identify/Endpoint.........................................................>
        Match:  <criteria.........................>
    Channel:  <ChannelId......................................>  <State.....>  <Time.....>
        Exten: <DialedExten...........>  CLCID: <ConnectedLineCID.......>
==========================================================================================

 Endpoint:  101/101                                              Unavailable   0 of inf
     InAuth:  auth101/101
        Aor:  101                                                1
      Contact:  101/sip:101@192.168.100.181;transport=udp  80c43b9db5 Unavail         nan
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  102/102                                              Not in use    0 of inf
     InAuth:  auth102/102
        Aor:  102                                                1
      Contact:  102/sip:102@192.168.100.128;transport=udp  c952550b82 Avail        16.807
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  103/103                                              Unavailable   0 of inf
     InAuth:  auth103/103
        Aor:  103                                                1
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  200/200                                              Not in use    0 of inf
     InAuth:  auth200/200
        Aor:  200                                                1
      Contact:  200/sip:200@192.168.100.198:5060           d1d7ab20ae Avail         7.063
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  208/208                                              Not in use    0 of inf
     InAuth:  auth208/208
        Aor:  208                                                1
      Contact:  208/sip:208@192.168.100.156;transport=udp  ad2e8f0ca2 Avail        33.985
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  301/301                                              Unavailable   0 of inf
     InAuth:  auth301/301
        Aor:  301                                                1
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  302/302                                              Not in use    0 of inf
     InAuth:  auth302/302
        Aor:  302                                                1
      Contact:  302/sip:302@192.168.100.175;transport=udp  3ae41fce1d Avail         8.704
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  303/303                                              Not in use    0 of inf
     InAuth:  auth303/303
        Aor:  303                                                1
      Contact:  303/sip:303@192.168.100.102;transport=udp  3bbac1f145 Avail        22.795
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  304/304                                              Not in use    0 of inf
     InAuth:  auth304/304
        Aor:  304                                                1
      Contact:  304/sip:304@192.168.100.207;transport=udp  322629ec13 Avail        21.246
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  401/401                                              Unavailable   0 of inf
     InAuth:  auth401/401
        Aor:  401                                                1
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  402/402                                              Unavailable   0 of inf
     InAuth:  auth402/402
        Aor:  402                                                1
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  403/403                                              Unavailable   0 of inf
     InAuth:  auth403/403
        Aor:  403                                                1
  Transport:  transport-udp             udp      0      0  0.0.0.0:5060

 Endpoint:  dummy_endpoint                                       Unavailable   0 of inf
```

With this information provided, this PHP script returns:

```
{
  "extensions": [
    "101",
    "102",
    "200",
    "208",
    "302",
    "303",
    "304"
  ]
}
```

All of these are logged in and available extensions.



