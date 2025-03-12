*** Settings ***
Resource    resource.robot
# LANG-001 Test Scenario Name: เปลี่ยนภาษาในส่วนผู้เยี่ยมชม (Guest Section) 

*** Test Cases ***

Test lang-001-Switch language Guest Section
    #Home page
    Log To Console    ===== Home =====
    Open site
    Check default is EN
    Toggle dropdown
    Select TH
    Check Navbar Menu Text is TH
    Check banner home page is TH
    Toggle dropdown
    Select CN
    Check Navbar Menu Text is CN
    Check banner home page is CN
    Close Browser Session
    
    #Researchers
    Log To Console    ===== Researchers =====
    Open site
    Click Researchers Link
    Click Reseachers cs link
    Check default is EN
    Toggle dropdown
    Select TH
    Check Navbar Menu Text is TH
    Check reseachers page is TH
    Toggle dropdown
    Select CN
    Check Navbar Menu Text is CN
    Check reseachers page is CN
    Close Browser Session

    #Research Project
    Log To Console    ===== Research Project =====
    Open site
    Click Research Project link
    Check default is EN
    Toggle dropdown
    Select TH
    Check Navbar Menu Text is TH
    Check reseachers project page is TH
    Toggle dropdown
    Select CN
    Check Navbar Menu Text is CN
    Check reseachers project page is CN
    Close Browser Session
    
    #Researchers group
    Log To Console    ===== Researchers group =====
    Open site
    Click Research Group link
    Check default is EN
    Toggle dropdown
    Select TH
    Check Navbar Menu Text is TH
    Check research group page is TH
    Toggle dropdown
    Select CN
    Check Navbar Menu Text is CN
    Check research group page is CN
    Close Browser Session

    #reports
    Log To Console    ===== Reports =====
    Open site
    Click reports link
    Check default is EN
    Toggle dropdown
    Select TH
    Check Navbar Menu Text is TH
    check reports page is TH
    Toggle dropdown
    Select CN
    Check Navbar Menu Text is CN
    Check reports page is CN
    Close Browser Session
