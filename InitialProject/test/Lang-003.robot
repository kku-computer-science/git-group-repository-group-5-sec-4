*** Settings ***
Resource    resource.robot
Resource    dashboard_resource.robot
# LANG-003 Test Scenario Name: เปลี่ยนภาษาในส่วนของผู้วิจัย (Researcher Section) 

*** Test Cases ***

Test lang-003-Switch language Researcher Section
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

    input Researcher user and password
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
    click user profile
    toggle admin dropdown
    select admin TH
    check user profile page is TH
    toggle admin dropdown
    select admin CN
    check user profile page is CN
    Close Browser Session