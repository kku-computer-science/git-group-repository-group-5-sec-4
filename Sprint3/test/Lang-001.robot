*** Settings ***
Resource    resource.robot
Resource    dashboard_resource.robot
# LANG-001 Test Scenario Name: เปลี่ยนภาษาในส่วนผู้เยี่ยมชม (Guest Section) 

*** Test Cases ***

Test lang-001-Switch language Guest Section-->Home page
    #Home page
    Open site
    Check default is EN
    Check banner home page is EN
    Check Navbar Menu Text is EN
    Sleep    1s
    Scroll to bottom
    Click 2022 Publications
    check referencel button in home is EN
    Scroll to top
    Toggle dropdown
    select admin TH
    Check banner home page is TH
    Check Navbar Menu Text is TH
    Sleep    1s
    Scroll to bottom
    Click 2022 Publications
    check referencel button in home is TH
    Scroll to top
    Toggle dropdown
    select admin CN
    Check banner home page is CN
    Check Navbar Menu Text is CN
    Sleep    1s
    Scroll to bottom
    Click 2022 Publications
    check referencel button in home is CN
    Sleep    1s
    Close Browser Session
Test lang-001-Switch language Guest Section-->Researchers page    
    #Researchers
   
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
    Toggle dropdown
    select admin EN
    Close Browser Session
Test lang-001-Switch language Guest Section-->Researchers details page    
    #Researchers details
    Open site
    Click Researchers Link
    Click Reseachers cs link
    click Reseachers details page
    Check details reseachers page is EN
    Sleep    2s
    Scroll to bottom
    Check details reseachers page in <td> is EN
    Sleep    2s
    Scroll to top
    
    Toggle dropdown
    Select TH
    Sleep    2s
    Scroll to bottom
    Check details reseachers page in <td> is TH
    Sleep    2s
    Scroll to top
    
    Check details reseachers page is TH
    Toggle dropdown
    Select CN
    Sleep    2s
    Scroll to bottom
    Check details reseachers page in <td> is CN
    Sleep    2s
    Scroll to top
   
    Check details reseachers page is CN
    Close Browser Session
Test lang-001-Switch language Guest Section-->Research Project page    
    #Research Project
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
Test lang-001-Switch language Guest Section-->Researchers group page       
    #Researchers group
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

Test lang-001-Switch language Guest Section-->Reports page    
    #reports
    
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
