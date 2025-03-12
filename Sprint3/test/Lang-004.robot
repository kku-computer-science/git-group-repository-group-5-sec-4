*** Settings ***
Resource    resource.robot
Resource    dashboard_resource.robot
# LANG-004 Test Scenario Name: เปลี่ยนภาษาในส่วนของเจ้าหน้าที่ (Staff Section) 

*** Test Cases ***

Test lang-004-Switch language Staff Section
   Log To Console    =====login to Researcher====
   Open site
   click login button
    check current url

    toggle admin dropdown
    select admin TH
    check login title is TH

    toggle admin dropdown
    select admin CN
    check login title is CN

    toggle admin dropdown
    select admin EN
    
    input staff user and password
    submit
    
    Log To Console    ====dashboard page====
    #defaul is EN
    check dashboard page is EN
    toggle admin dropdown
    select admin TH
    check dashboard page is TH
    toggle admin dropdown
    select admin CN
    check dashboard page is CN
    sleep   1s

    
    Log To Console    ====user profile====
    click manage program
    toggle admin dropdown
    select admin TH
    check manage program is TH
    toggle admin dropdown
    select admin CN
    check manage program is CN
    Close Browser Session